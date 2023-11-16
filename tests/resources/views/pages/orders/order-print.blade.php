<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        .wrapper {
            /* border: 1px solid red; */
            width: 250px;
            font-size: 12px;
        }    
        .left {
            text-align: left;
        }    
        .center {
            text-align: center;
        }    
        .right {
            text-align: right;
        }   
        .font-16 {
            font-size: 16px;
        } 
        .bold {
            font-weight: bold;
        }
    </style>
    <script>

        function cetak() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <table width="100%" style="border-bottom: 1px solid #aaa">
            <tr>
                <td width="60">
                    {!! QrCode::size(50)->generate($item->order_number) !!}</td>

                <td>
                    <div class="center font-16 bold" style="margin-bottom: 5px">
                        <div> Diamond</div>
                    </div>
                    <div class="center">{{$item->order_number}}</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">Tanggal {{$item->created_at_display}}</td>
            </tr>
        </table>
        <table width="100%">
            <tr class="bold">
                <td>Item</td>
                <td>Code</td>
                <td style="text-align: right">Harga</td>
            </tr>
            @if ($item->items AND count($item->items) > 0)
                @foreach ($item->items as $orderItem)
                    <tr>
                        <td>{{ $orderItem->product_type }}</td>
                        <td>{{ $orderItem->code }}</td>
                        <td style="text-align: right">{{ $orderItem->price_display }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <table width="100%" style="border-top: 1px solid #aaa">
            <tr class="bold" >
                <td colspan="2">Total</td>
                <td style="text-align: right">{{$item->total_price_display}}</td>
            </tr>
        </table>
        <div class="center bold">Terima Kasih</div>
        <div style="margin-top: 10px; text-align:center">
            @if (\Request::get('from') == 'list')
                <a href="{{route('order-list')}}">Kembali</a>
            @elseif (\Request::get('from') == 'with-parking')
                <a href="{{route('new-order-with-parking')}}">Kembali</a>
            @else 
                <a href="{{route('new-order')}}">Kembali</a>
            @endif
            <button onclick="cetak()">Print</button>
        </div>
    </div>
</body>
</html>



