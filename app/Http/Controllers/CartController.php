<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtotal = Cart::with('medicine')->where('user_id', Auth::id())->get()->map(function ($cart) {
            return $cart->medicine->price * $cart->quantity;
        })->sum();

        $carts = Cart::with(['user', 'medicine'])->where('user_id', Auth::id())->get();
        $tax = $subtotal * 0.02;
        $pickup = 12000;
        $promo = 9000;
        $total = $subtotal + $tax + $pickup - $promo;

        return view('cart.index', compact(['carts', 'subtotal', 'tax', 'total', 'pickup', 'promo']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['qty' => 'required|numeric|min:1']);

        $userId = Auth::id();

        $cartItem = Cart::where('user_id', $userId)
            ->where('medicine_id', $request->medicine_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->qty;
            $proses = $cartItem->save();
        } else {
            $proses = Cart::create([
                'user_id' => $userId,
                'medicine_id' => $request->medicine_id,
                'quantity' => $request->qty
            ]);
        }

        return $proses
            ? redirect()->back()->with('success', [
                'title' => 'Success',
                'message' => ' Berhasil ditambahkan ke keranjang'
            ])
            : redirect()->back()->with('error', [
                'title' => 'Error',
                'message' => 'Data gagal ditambahkan'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        $process = $cart->delete();

        return $process
            ? redirect()->route('cart.index')->with('success', [
                'title' => 'Success',
                'message' => 'Data berhasil dihapus'
            ])
            : redirect()->route('cart.index')->with('error', [
                'title' => 'Error',
                'message' => 'Data gagal dihapus'
            ]);
    }

    /**
     * Checkout the cart
     */
    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())->get();

        foreach ($cart as $item) {
            $item->delete();
        }

        return redirect()->route('cart.index')->with('success', [
            'title' => 'Success',
            'message' => 'Berhasil checkout'
        ]);
    }
}
