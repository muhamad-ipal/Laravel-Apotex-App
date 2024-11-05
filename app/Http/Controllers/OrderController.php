<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('order.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'medicine_id' => 'required|array',
            'medicine_id.*' => 'exists:medicines,id',
            'qty' => 'required|array',
            'qty.*' => 'numeric|min:1'
        ]);

        $arrayAssocMedicines = [];

        foreach ($request->medicine_id as $index => $id) {
            $medicine = Medicine::findOrFail($id);
            $qty = $request->qty[$index];
            $subPrice = $medicine->price * $qty;

            $arrayAssocMedicines[] = [
                'medicine_name' => $medicine->name,
                'qty' => $qty,
                'sub_price' => $subPrice,
            ];
        }

        $totalPrice = array_reduce($arrayAssocMedicines, function ($carry, $item) {
            return $carry + $item['sub_price'];
        }, 0);

        $proses = Order::create([
            'user_id' => auth()->user()->id,
            'medicines' => json_encode($arrayAssocMedicines),
            'customer_name' => $request->customer_name,
            'total_price' => $totalPrice * 1.1,
        ]);

        if ($proses) {
            $order = Medicine::findOrFail($proses->id);
            $order->update([
                $order->stock - $qty
            ]);

            return redirect()->route('cashier.order.struk', $proses->id)->with('success', [
                'title' => 'Order created',
                'message' => 'Order has been created successfully'
            ]);
        } else {
            return redirect()->back()->with('error', [
                'title' => 'Order failed',
                'message' => 'Order failed to create'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proses = Order::findOrFail($id)->delete();

        return $proses
            ? redirect()->back()->with('success', [
                'title' => 'Order deleted',
                'message' => 'Order has been deleted successfully'
            ])
            : redirect()->back()->with('error', [
                'title' => 'Order failed',
                'message' => 'Order failed to delete'
            ]);
    }

    public function struk($id)
    {
        $order = Order::findOrFail($id);
        return view('order.struk', compact('order'));
    }

    public function downloadStruk($id)
    {
        $order = Order::findOrFail($id)->toArray();

        view()->share('order', $order);

        $pdf = Pdf::loadView('order.download-struk', $order);

        return $pdf->setPaper('a4', 'landscape')->download('hasil.pdf');
    }
}
