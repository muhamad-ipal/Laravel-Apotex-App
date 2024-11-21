<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class OrdersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
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
            'No',
            'Order ID',
            'Cashier',
            'Customer Name',
            'Products',
            'Total Items',
            'Total Price',
            'Tanggal Pembelian'
        ];
    }

    public function map($order): array
    {
        $products = [];
        foreach (json_decode($order->medicines, true) as $key => $value) {
            $products[] = ($key + 1) . '. ' . $value['medicine_name'] . ' Rp' . number_format($value['sub_price'], 0, ',', '.') . " ×" . $value['qty'];
        }

        return [
            $order->id,
            '#' . number_format($order->id / 1000, 3, '', ''),
            $order->user->name,
            $order->customer_name,
            implode("\n", $products),
            count(json_decode($order->medicines, true)),
            "Rp" . number_format($order->total_price, 0, ',', '.'),
            \Carbon\Carbon::parse($order->created_at)->locale('id')->translatedFormat('Y-M-l')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 12
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4472C4']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ]
            ],
            'A1:H' . ($sheet->getHighestRow()) => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000']
                    ]
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER
                ]
            ],
            'A2:B' . ($sheet->getHighestRow()) => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER
                ]
            ],
            'F2:G' . ($sheet->getHighestRow()) => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER
                ]
            ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getRowDimension(1)->setRowHeight(25);

                $event->sheet->getStyle('E2:E' . $event->sheet->getHighestRow())
                    ->getAlignment()
                    ->setWrapText(true);

                $event->sheet->getColumnDimension('E')->setWidth(50);

                $event->sheet->freezePane('A2');
            },
        ];
    }
}
