<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::with('user')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Customer Name',
            'Kasir',
            'Medicine',
            'Total Price',
            'Tanggal Pembelian'
        ];
    }

    public function map($order): array
    {
        $medicines = '';
        foreach (json_decode($order->medicines, true) as $key => $value) {
            $medicines .= ($key + 1) . '. ' . $value['medicine_name'] . ' Rp' . number_format($value['sub_price'], 0, ',', '.') . " ×" . $value['qty'] . "\n";
        }

        return [
            $order->id,
            $order->nama_customer,
            $order->user->name,
            $medicines,
            "Rp" . number_format($order->total_price, 0, ',', '.'),
            \Carbon\Carbon::parse($order->created_at)->locale('id')->translatedFormat('Y-M-l')
        ];
    }
}
