<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->name }} | {{ $data->type }} | {{$data->created_at}}</title>
    <style>
        .qr-1 {
            width: 30px;
            height: 30px;
            position: absolute;
            z-index: 1;
            top: 125px;
            left: 75px;
        }    
        .price-1 {
            position: absolute;
            z-index: 1;
            top: 90px;
            left: 50px;
            font-size: 16px;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
        }   
        .code-1 {
            position: absolute;
            z-index: 1;
            top: 210px;
            left: 78px;
        }  
        .price-2 {
            position: absolute;
            z-index: 1;
            top: 110px;
            right: 220px;
            font-size: 26px;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
        }    
           
        .code-2 {
            position: absolute;
            z-index: 1;
            top: 199px;
            right: 77px;
        }    
        .qr-2 {
            width: 60px;
            height: 60px;
            position: absolute;
            z-index: 1;
            top: 120px;
            right: 80px;
        }    
        .code-3 {
            position: absolute;
            z-index: 1;
            top: 22px;
            right: -10px;
            transform: rotate(90deg);
        }    
        .qr-3 {
            width: 80px;
            height: 80px;
            position: absolute;
            z-index: 1;
            top: 0px;
            right: 15px;
        } 
        .wrapper {
            width: 1587px;
            position: relative;
        }   
        .tic-wrapp {
            border: 1px solid #333;
            width: 794px;
            /* float: left;
            margin: 0 10px; */
            position: relative;
            margin-bottom: 4px;
        }
        .img {
            width: 100%;
            position: relative;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @if ($items AND count($items) > 0)
            @foreach ($items as $item)
                <div class="tic-wrapp">
                    @if ($item->image)
                        <img class="img" src="{{$item->image}}"/>
                    @else
                        <img class="img" src="{{asset('/assets/images/tiket-kosong.jpeg')}}"/>
                    @endif
                    <div class="code-1">
                        <div>{{$item->code}}</div>
                    </div>
                    <div class="code-2">
                        <div>{{$item->code}}</div>
                    </div>
                    <div class="price-1">
                        <div>{{$item->ticketType->price_display}}</div>
                    </div>
                    <div class="price-2">
                        <div>{{$item->ticketType->price_display}}</div>
                    </div>
                    <div class="qr-1">
                        {!! QrCode::size(40)->generate($item->code); !!}
                    </div>
                    <div class="qr-2">
                        {!! QrCode::size(50)->generate($item->code); !!}
                    </div>
                </div>
                {{-- <div class="tic-wrapp">
                    <img class="img" src="{{asset('/assets/images/bracelet-ticket.png')}}"/> --}}
                    {{-- <div class="code-1">
                        <div>{{$item->code}}</div>
                    </div>
                    <div class="price-1">
                        <div>{{$item->ticketType->price_display}}</div>
                    </div>
                    <div class="qr-1">
                        {!! QrCode::size(40)->generate($item->code); !!}
                    </div>
                    <div class="price-2">
                        <div>{{$item->ticketType->price_display}}</div>
                    </div> --}}
                    {{-- <div class="code-3">
                        <div>{{$item->code}}</div>
                    </div>
                    <div class="qr-3">
                        {!! QrCode::size(63)->generate($item->code); !!}
                    </div> --}}
                {{-- </div> --}}
            @endforeach
        @endif
    </div>
</body>
</html>