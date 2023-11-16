<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kwitansi</title>
    <style>
        .wrapper {
            font-size: 13px;
            /* height: 420px; */
            width: 100%;
            /* border: 1px solid #333; */
        }
        .title {
            font-size: 18px;
            font-weight: 600;
            line-height: 20px;
        }
        .align-top {vertical-align: top;}
        .sub-title {
            font-size: 13px;
            font-weight: 600;
            line-height: 20px;
        }
        .border-btm {
            border-bottom: 1px solid #000;
        }
        .section {
            width: 100%;
            padding: 5px 0;
            border-bottom: 3px double #000;
        }
        .no-border {
            border: none;
        }
        .border {border: 1px solid #000;}
        .bold { font-weight: 600;}
        .border-b {border-bottom: 1px solid #000;}
        .border-t {border-top: 1px solid #000;}
        .center {text-align: center; margin: 0 auto;}
        .right {text-align: right;}
        .ttd {height: 20px;}
        .logo {
            width: 50px;
            height: 50px;
            margin-bottom: 15px;
        }
        .table, .table tr td{
            border: 1px solid #000;
            border-collapse: collapse;
        }
        .table tr td{height: 24px;}
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="section no-border">
            <table style="margin: 0 auto;">
                <tr>
                    <td width="70">
                        <div class="logo">
                            <img src="http://103.41.207.108/assets/images/logo.png" width="60">
                        </div>
                    </td>
                    <td style="text-align: center">
                        <div class="title">YAYASAN MAHA BHOGA MARGA</div>
                        <div class="sub-title">{{\Str::upper($group->group_type->name)}}</div>
                        <div class="sub-title">KARTU PEMBAYARAN CICILAN</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section">
            <table width="100%">
                <tr>
                    <td width="50%">
                        <table width="100%">
                            <tr>
                                <td width="100">Nama Ketua</td>
                                <td width="10">:</td>
                                <td>{{$group->head_group}}</td>
                            </tr>
                            <tr>
                                <td class="align-top">Alamat</td>
                                <td class="align-top">:</td>
                                <td>{{$group->address}}</td>
                            </tr>
                            <tr>
                                <td>Pinjaman No.</td>
                                <td>:</td>
                                <td>{{$item->loan_number}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Realisasi</td>
                                <td>:</td>
                                <td>{{$item->realize_date_display}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Jatuh Tempo</td>
                                <td>:</td>
                                <td>{{$item->due_date_display}}</td>
                            </tr>
                            <tr>
                                <td>Mulai Mengangsur</td>
                                <td>:</td>
                                <td>{{$item->installment_start_date_display}}</td>
                            </tr>
                        </table>
                    </td>
                    <td class="align-top">
                        <table width="100%">
                            <tr>
                                <td>{{$group->group_type->initial}}</td>
                                <td>:</td>
                                <td>{{$group->name}}</td>
                            </tr>
                            <tr>
                                <td>Pokok Pinjaman</td>
                                <td>:</td>
                                <td>{{$item->realize_loan_amount}}</td>
                            </tr>
                            <tr>
                                <td>Jangka Waktu</td>
                                <td>:</td>
                                <td>{{$loanSystem->tenor}}</td>
                            </tr>
                            <tr>
                                <td>Bunga</td>
                                <td>:</td>
                                <td>{{$loanSystem->interest}}% {{$loanSystem->type}}</td>
                            </tr>
                            <tr>
                                <td>Angsuran Perbulan</td>
                                <td>:</td>
                                <td>{{$item->installment_per_month}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section no-border">
            <table class="table" width="100%">
                <tr>
                    <td rowspan="2" class="center">Tanggal</td>
                    <td colspan="5" class="center">PEMBAYARAN</td>
                    <td rowspan="2" class="center">Penerima</td>
                    <td rowspan="2" class="center">Ket.</td>
                </tr>
                <tr>
                    <td class="center">Pokok</td>
                    <td class="center">Bunga</td>
                    <td class="center">Denda</td>
                    <td class="center">Jumlah</td>
                    <td class="center">Saldo</td>
                </tr>
                @for ($i = 0; $i < $loanSystem->tenor; $i++)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            </table>

        </div>
    </div>
</body>
</html>