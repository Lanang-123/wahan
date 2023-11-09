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
                    {!! QrCode::size(50)->generate($item->checkin_number) !!}</td>

                <td>
                    <div class="center font-16 bold" style="margin-bottom: 5px">
                        <div>Parkir Diamond</div>
                    </div>
                    <div class="center">{{$item->checkin_number}}</div>
                </td>
            </tr>
            <tr>
                <td colspan="2">{{$item->created_at_display}} | {{$item->time_display}}</td>
            </tr>
        </table>
        <table width="100%" style="margin-bottom: 15px">
            <tr>
                <td>Nomor Polisi</td>
                <td class="right">{{$item->police_number}}</td>
            </tr>
            <tr>
                <td>Jenis Kendaraan</td>
                <td class="right">{{$item->carType->name}}</td>
            </tr>
            <tr>
                <td>Driver</td>
                <td class="right">
                    @if ($item->is_fee)
                        Ya
                    @else
                        Tidak
                    @endif    
                </td>
            </tr>
            <tr>
                <td>Total Penumpang</td>
                <td class="right">{{$item->total_passengers}}</td>
            </tr>
            <tr>
                <td>Negara</td>
                <td class="right">{{$item->country}}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td class="right bold">{{$item->price_display}}</td>
            </tr>
        </table>
        <div class="center bold">Terima Kasih</div>
        <div style="margin-top: 10px">
            <a href="{{route('report-parkings')}}">Kembali</a>
            <button onclick="cetak()">Print</button>
        </div>
    </div>
</body>
</html>



