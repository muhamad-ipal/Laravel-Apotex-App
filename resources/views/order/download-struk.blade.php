<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apotex App</title>
    <style>
        .address,.quantity,.thank-you{text-align:center}.container{position:relative;width:100%;max-width:576px;padding:20px 28px;margin:0 auto;font-weight:500;color:#6b7280;background-color:#fff;border:1px solid #e5e7eb}.logo{display:block;width:3rem;filter:grayscale(100%);margin:0 auto}.address,.bordered-table,.thank-you,.time-info,.totals{margin-top:28px}.address{font-size:1rem}.time-info,.total-price,.total-qty{display:flex;justify-content:space-between}.bordered-table{border-top:2px dashed #9ca3af;border-bottom:2px dashed #9ca3af;padding:28px 0}.medicine-table{width:100%;table-layout:fixed}.medicine-table td{padding:10px 0}.price,.right-align{text-align:right}.customer-name{font-weight:700;color:#1f2937;text-transform:capitalize}
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('assets/img/logo.webp') }}" class="logo" alt="logo">
        <div class="address">Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16146
        </div>
        <div class="time-info">
            <span>Waktu: {{ \Carbon\Carbon::parse($order['created_at'])->format('d-m-Y') }}</span>
            <span>{{ \Carbon\Carbon::parse($order['created_at'])->format('H:i:s') }}</span>
        </div>
        <div class="bordered-table">
            <table class="medicine-table">
                @foreach (json_decode($order['medicines']) as $item)
                    <tr>
                        <td>{{ explode('-', $item->medicine_name)[0] }}</td>
                        <td class="quantity">x {{ $item->qty }}</td>
                        <td class="price">Rp {{ number_format($item->sub_price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="totals">
            <div class="total-qty">
                <span>Total Qty</span>
                <span class="right-align">
                    @php
                        $totalQty = 0;
                        foreach (json_decode($order['medicines']) as $orderItem) {
                            $totalQty += $orderItem->qty;
                        }
                        echo $totalQty;
                    @endphp
                </span>
            </div>
            <div class="total-price">
                <span>Total Bayar</span>
                <span class="right-align">Rp{{ number_format($order['total_price'], 0, ',', '.') }}</span>
            </div>
        </div>
        <div class="thank-you">
            Hai <span class="customer-name">{{ $order['customer_name'] }}</span>, Terima kasih telah berbelanja di toko
            kami.
        </div>
    </div>
</body>

</html>
