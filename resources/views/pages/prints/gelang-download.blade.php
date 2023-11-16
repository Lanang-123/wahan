<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->name }} | {{ $data->type }} | {{$data->created_at}}</title>
    <style>
          
        .code-3 {
            position: absolute;
            z-index: 1;
            top: 45px;
            right: -10px;
            transform: rotate(90deg);
            font-size: 18px;
        }    
        .qr-3 {
            width: 100px;
            height: 100px;
            position: absolute;
            z-index: 1;
            top: 15px;
            right: 25px;
        } 
        .wrapper {
            width: 3000px;
            position: relative;
            /* border: 1px solid red; */
        }   
        .tic-wrapp {
            /* border: 1px solid #999; */
            width: 1475px;
            float: left;
            margin: 0 10px;
            position: relative;
            /* margin-bottom: 8px; */
        }
        .img {
            vertical-align: middle;
            /* width: 795px; */
            width: 1330px;
            position: relative;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        @if ($items AND count($items) > 0)
            @foreach ($items as $item)
                {{-- <div class="tic-wrapp">
                    <img class="img" src="{{asset('/assets/images/tiket-kosong.jpeg')}}"/>
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
                </div> --}}
                <div class="tic-wrapp">
                    @php
                    $pathInfo = pathinfo($item->ticket_image);
                        $fileName = $pathInfo['filename'] . '.' . $pathInfo['extension'];
                    @endphp 
                    @if ($item->ticket_image)
                        {{-- <img class="img" src="{{$item->ticket_image}}"/> --}}
                        <img src="{{ route('show-image', ['imageName' => $fileName]) }}" width="220" alt="Gambar {{ $item->name }}">
                    @else
                        <img class="img" src="{{asset('/assets/images/bracelet-ticket.png')}}"/>
                    @endif
                    {{-- <img class="img" src="{{asset('/assets/images/bracelet-ticket.png')}}"/> --}}
                    {{-- <div class="code-1">
                        <div>{{$item->code}}</div>
                    </div> --}}
                    {{-- <div class="price-1">
                        <div>{{$item->ticketType->price_display}}</div>
                    </div> --}}
                    {{-- <div class="qr-1">
                        {!! QrCode::size(40)->generate($item->code); !!}
                    </div> --}}
                    {{-- <div class="price-2">
                        <div>{{$item->ticketType->price_display}}</div>
                    </div> --}}
                    <div class="code-3">
                        <div>{{$item->code}}</div>
                    </div>
                    <div class="qr-3">
                        {!! QrCode::size(90)->generate($item->code) !!}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>