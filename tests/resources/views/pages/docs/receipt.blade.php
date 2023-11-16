<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kwitansi</title>
    <style>
        .wrapper {
            font-size: 14px;
            width: 415px;
            height: 595px;
        }
        .title {
            font-size: 13px;
            font-weight: 600;
        }
        .border-btm {
            border-bottom: 1px solid #000;
        }
        .section {
            width: 100%;
            padding: 5px 0;
        }
        .no-border {
            border: none;
        }
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
        .top {
            vertical-align: top;
        }
        .kwitansi {
            margin: 20px 0 20px 40px;
            width: 80px;
            text-align: center;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 600;
            /* border: 1px solid #000; */
        }
        .white {
            color: #fff;
        }
        .lh-20 {
            line-height: 19px;
        }
        .lh-30 {
            line-height: 29px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="section">
            <div style="height:145px;"></div>
            <div style="margin-left: 80px">MBM KAPAL, {{$item->realize_date_display}}</div>
        </div>

        <div class="section">
            <table>
                <tr>
                    <td class="white lh-20" width="72">Nama</td>
                    <td>{{$group->head_group}} ({{ $group->name }})</td>
                </tr>
                <tr>
                    <td class="white lh-20">Alamat</td>
                    <td>{{$group->short_address}}</td>
                </tr>
                <tr>
                    <td class="white lh-20">No. PK</td>
                    <td>{{$item->loan_number}}</td>
                </tr>
                <tr>
                    <td class="white lh-20">Usaha</td>
                    <td>{{$group->business_type}}</td>
                </tr>
            </table>
        </div>

        <div class="no-border">
            <table  width="100%">
                <tr>
                    <td class="white">Jumlah Realisasi Pinjaman </span></td>
                    <td class="center"><span class="bold">{{$group->group_type->initial}}</span></td>
                    <td class="right bold">{{ str_replace('Rp', '', $item->realize_loan_amount)}}</td>
                </tr>
            </table>
        </div>
        <div style="height:22px;"></div>
        <div class="section no-border">
            <table class="lh-30" width="100%">
                <tr>
                    <td width="60" class="white">admin</td>
                    <td class="right">{{ str_replace('Rp', '', $deductions['admin_fee'])}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="white"></td>
                    <td class="right">{{ str_replace('Rp', '', $deductions['stamp_duty'])}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="white">space</td>
                    <td class="right"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="right">{{ str_replace('Rp', '', $deductions['total']) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="right white bold">Terima Bersih</td>
                    <td class="right title" height="34">{{ str_replace('Rp', '', $item->realize_loan_amount_net) }}</td>
                </tr>
            </table>
            <div class="kwitansi white">
                KWITANSI
            </div>
            <table  width="100%" style="margin-top:30px;">
                <tr>
                    <td>
                        <table class="center">
                            <tr><td class="white">PENERIMA</td></tr>
                            <tr><td class="ttd"></td></tr>
                            <tr><td>{{$group->head_group}}</td></tr>
                        </table>
                    </td>
                    <td>
                        <table class="right">
                            <tr><td class="white">YAYASAN MAHA BHOGA MARGA</td></tr>
                            <tr><td class="ttd"></td></tr>
                            <tr><td class="right">{{$headOfDivision}}</td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="margin-bottom: 30px;" width="100%">
                <tr>
                    <td class="top left">
                        YANG MENYERAHKAN
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td class="center" style="padding-right: 30px;">
                        {{$cashierName}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>