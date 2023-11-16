<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perjanjian Kredit</title>
    <style>
        .wrapper {
            font-size: 18px;
            width: 88%;
            margin-left: 8%;
            margin-right: 4%;
        }
        .font-13 {
            font-size: 13px;
        }
        .font-15 {
            font-size: 15px;
        }
        .px-15 {padding-left: 15px;padding-right: 15px; }
        .px-5 {padding-left: 5px;padding-right: 5px; }
        .title {
            font-size: 20px;
            font-weight: 600;
            line-height: 25px;
        }
        .sub-title {
            font-size: 13px;
            font-weight: 600;
            line-height: 20px;
        }
        .align-top {vertical-align: top;}
        .align-bottom {vertical-align: bottom;}
        .border-btm {
            border-bottom: 1px solid #000;
        }
        .section {
            width: 100%;
            padding: 5px 0;
            border-bottom: 3px double #000;
        }
        .my {margin-top: 8px; margin-bottom: 8px;}
        .no-border {
            border: none;
        }
        .ttd {height: 25px;}
        .border {border: 1px solid #000;}
        .bold { font-weight: 600;}
        .border-b {border-bottom: 1px solid #000;}
        .border-t {border-top: 1px solid #000;}
        .center {text-align: center; margin: 0 auto;}
        .right {text-align: right;}
        .mb-20 {margin-bottom: 15px;}
        
        .table, .table tr td, .table2, .table2 tr td{
            border: 1px solid #000;
            border-collapse: collapse;
        }
        .table tr td{height: 50px;}
        .table2 tr td{height: 20px;}
        .page-break { page-break-before: always; }
    </style>
</head>
<body style="margin-top: 140px; margin-bottom: 60px;">
    <div class="wrapper">
        <div class="section">
            <table style="margin: 0 auto;">
                <tr>
                    <td style="text-align: center">
                        <div class="title">PERJANJIAN KREDIT</div>
                        <div class="title">{{\Str::upper($group->group_type->name)}}</div>
                        <div class="title">({{$group->group_type->initial}})</div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="section no-border">
            <table width="100%"><tr><td class="center">Nomor: {{$item->loan_number}}</td></tr></table>
            <table class="my" width="100%"><tr><td >Yang bertanda tangan dibawah ini:</td></tr></table>
            
            <table>
                <tr>
                    <td width="12">Ia</td>
                    <td width="90">Nama</td>
                    <td width="10">:</td>
                    <td>{{$head['name']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>No NIK/SIM</td>
                    <td>:</td>
                    <td>{{$head['card_number']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Umur</td>
                    <td>:</td>
                    <td>{{$head['age']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{$head['profession']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$head['address']}}</td>
                </tr>
            </table>
            <table class="my" width="100%"><tr><td >bertindak dalam kedudukannya sebagai Ketua {{$group->group_type->initial}} {{\Str::upper($group->name)}},</td></tr></table>
            <table>
                <tr>
                    <td width="12">Ib</td>
                    <td width="90">Nama</td>
                    <td width="10">:</td>
                    <td>{{$treasurer['name']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>No NIK/SIM</td>
                    <td>:</td>
                    <td>{{$treasurer['card_number']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Umur</td>
                    <td>:</td>
                    <td>{{$treasurer['age']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{$treasurer['profession']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$treasurer['address']}}</td>
                </tr>
            </table>
            <table class="my" width="100%"><tr><td >bertindak dalam kedudukannya sebagai Bendahara {{$group->group_type->initial}} {{\Str::upper($group->name)}} ,</td></tr></table>
            <table class="my" width="100%"><tr><td >Keduanya bertindak untuk dan atas nama {{$group->group_type->name}} {{\Str::upper($group->name)}} , selanjutnya disebut Pihak Pertama,</td></tr></table>
            <table>
                <tr>
                    <td width="12">II</td>
                    <td width="90">Nama</td>
                    <td width="10">:</td>
                    <td>{{$kabid['name']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Umur</td>
                    <td>:</td>
                    <td>{{$kabid['age']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="align-top">Jabatan</td>
                    <td class="align-top">:</td>
                    <td>{{$kabid['profession']}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="align-top">Alamat</td>
                    <td class="align-top">:</td>
                    <td>{{$kabid['address']}}</td>
                </tr>
            </table>
            <table class="my" width="100%"><tr><td >Bertindak untuk dan atas nama Yayasan Maha Bhoga Marga, selanjutnya disebut Pihak Kedua,</td></tr></table>
            <table class="my" width="100%"><tr><td >Bahwa Pihak Pertama telah mengajukan permohonan untuk memperoleh pinjaman dari Yayasan Maha Bhoga Marga dan atas permohonan tersebut, Pihak Pertama dan Pihak Kedua telah saling setuju untuk dan dengan ini membuat/menetapkan Perjanjian Kredit dengan syarat sebagai berikut :</td></tr></table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 1</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Pihak Pertama, penerima dana dampingan, telah menerima uang dari Pihak Kedua, Yayasan Maha Bhoga Marga, oleh karena itu penerima dana dampingan menjadi berhutang kepada Yayasan Maha Bhoga Marga sebesar {{$item->realize_loan_amount}} ( {{$item->realize_loan_amount_text}} ), yang diterima oleh pihak Pertama secara tunai untuk pengembangan usaha Dagang .</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 2</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Pinjaman tersebut akan dilunasi dalam jangka waktu {{$loanSystem->tenor}} bulan terhitung dari tanggal {{$item->realize_date_display}} sampai dengan {{$item->due_date_display}} . Pihak Pertama berjanji kepada pihak Kedua untuk membayar lunas dana dampingan yang diterima dengan cara mengangsur setiap bulan dengan pokok dan jasa angsuran {{$item->installment_per_month}} ( {{$item->installment_per_month_text}} ) mulai {{$item->installment_start_date_display}}.</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 3</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Pihak Pertama bersedia membayar jasa dana dampingan sebesar {{$loanSystem->interest}} % sebulan tetap atau dapat dinaikkan apabila ada kebijaksanaan pemerintah dan situasi ekonomi yang mengharuskan dilakukan perubahan suku jasa setiap bulan. Terhadap angsuran yang terlambat dibayar, penerima dana dampingan dibebankan denda sebesar 1(satu) kali jasa yang harus dibayar setiap bulan.</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 4</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Apabila dalam jangka waktu angsuran, peminjam tidak dapat melunasi hutangnya, maka perjanjian ini tetap mengikat sampai hutang dibayar lunas. Hutang/sisa hutang dapat ditagih seketika sekaligus oleh Yayasan Maha Bhoga Marga meliputi pokok, jasa, denda dan biaya lainnya tetap diperhitungkan berjalan sampai hutang dibayar lunas.</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 5</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Untuk menjamin pihak pertama dapat melunasi hutangnya maka Pihak pertama, penerima Dana dampingan, berjanji untuk menerapkan sistem tanggung renteng sebagaimana yang telah disepakati saat pembentukan kelompok sebagai perwujudan dari modal kepercayaan antar satu anggota dengan anggota lainnya dalam KPM dan kepercayaan (trust capital) antara Pihak Pertama dengan Pihak Kedua.</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 6</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td>Bilamana pihak pertama tidak membayar lunas kembali hutangnya kepada pihak kedua dalam jangka waktu yang telah ditetapkan, baik hutang yang ditimbulkan oleh perjanjian ini maupun karena apapun juga yang dapat timbul pada suatu ketika serta termasuk segala perhitungan jasa dan denda Pihak Kedua tetap menjalin hubungan untuk menghindari bubarnya kelompok.</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Pasal 7</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Terhadap perjanjian ini segala akibatnya berlaku pula syarat-syarat umum mengenai hubungan pinjaman dengan Yayasan Maha Bhoga Marga, yang telah disetujui dan mengikat semua anggota {{$group->group_type->initial}} yang menjadi pihak pengambil dana dampingan. Pinjaman ini juga berlaku bagi ahli waris penerima dana dampingan dan untuk itu para pihak memilih kedudukan hukum di kepaniteraan Pengadilan Negeri Denpasar.</td></tr>
            </table>
            <table class="my" width="100%">
                <tr><td >Demikianlah perjanjian ini dibuat dan disetujui bersama.</td></tr>
            </table>

            <table class="my" width="100%">
                <tr><td class="center">{{$group->district}}, {{$item->realize_date_display}}</td></tr>
            </table>
            <table width="100%" style="margin-bottom: 20px;">
                <tr>
                    <td class="align-top">
                        <table class="center">
                            <tr><td>Pihak Pertama</td></tr>
                            <tr><td>Penerima Dana Dampingan</td></tr>
                            <tr><td class="ttd"></td></tr>
                            <tr><td><span class="border-b">{{$head['name']}}</span></td></tr>
                            <tr><td><span>Ketua</span></td></tr>
                        </table>
                    </td>
                    <td class="align-top">
                        <table class="center">
                            <tr><td>Pihak Kedua</td></tr>
                            <tr><td>(Yayasan Maha Bhoga Marga)</td></tr>
                            <tr><td>Pemberi Dana Dampingan</td></tr>
                            <tr><td class="ttd"></td></tr>
                            <tr><td><span class="border-b">{{$kabid['name']}}</span></td></tr>
                            <tr><td><span>Kabag</span></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="47%" style="margin-bottom: 20px;">
                <tr>
                    <td class="align-top">
                        <table class="center">
                            <tr><td class="ttd"></td></tr>
                            <tr><td><span class="border-b">{{$treasurer['name']}}</span></td></tr>
                            <tr><td><span>Bendahara</span></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="my" width="100%">
                <tr><td class="center">Mengetahui</td></tr>
            </table>
            <table width="100%" style="margin-bottom: 20px;">
                <tr>
                    <td class="align-top">
                        <table class="center">
                            <tr><td>Yayasan Maha Bhoga Marga</tr>
                            <tr><td class="ttd"></td></tr>
                            <tr><td><span class="border-b">{{$headOfMbm}}</span></td></tr>
                            <tr><td><span>Ketua</span></td></tr>
                        </table>
                    </td>
                    <td class="align-top">
                        <table class="center">
                            <tr><td>{{$group->village_officials}}</td></tr>
                            <tr><td class="ttd"></td></tr>
                            <tr><td><span class="border-b">{{$group->headman}}</span></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="page-break">
                <div class="section">
                    <table>
                        <tr>
                            <td colspan="3" class="title">{{\Str::upper($group->group_type->name)}}</td>
                        </tr>
                        <tr>
                            <td width="50">{{$group->group_type->initial}}</td>
                            <td width="10">:</td>
                            <td>{{$group->name}}</td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td>{{$group->address}}</td>
                        </tr>
                    </table>
                </div>
                <table class="my" width="100%">
                    <tr><td class="center"><span class="border-b">SURAT KUASA</span></td></tr>
                </table>
                <table class="my" width="100%">
                    <tr><td>Yang bertanda tangan di bawah ini kami (sesuai dengan daftar nama terlampir) bertindak sebagai anggota {{$group->group_type->initial}} “ {{\Str::upper($group->name)}} ”, memberi kuasa kepada :</td></tr>
                </table>
                <table class="my">
                    <tr>
                        <td width="12">Ia</td>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$head['name']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>No NIK/SIM</td>
                        <td>:</td>
                        <td>{{$head['card_number']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Umur</td>
                        <td>:</td>
                        <td>{{$head['age']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{$head['profession']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$head['address']}}</td>
                    </tr>
                </table>
                <table class="my">
                    <tr>
                        <td width="12">Ib</td>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$treasurer['name']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>No NIK/SIM</td>
                        <td>:</td>
                        <td>{{$treasurer['card_number']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Umur</td>
                        <td>:</td>
                        <td>{{$treasurer['age']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{$treasurer['profession']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$treasurer['address']}}</td>
                    </tr>
                </table>
                <table class="my" width="100%">
                    <tr><td>Guna bertindak untuk dan atas nama pemberi kuasa :</td></tr>
                </table>
                <table class="my" width="100%">
                    <tr>
                        <td class="align-top">1.</td>
                        <td>Menandatangani surat permohonan dana dampingan {{$group->group_type->name}} ({{$group->group_type->initial}}).</td>
                    </tr>
                    <tr>
                        <td class="align-top">2.</td>
                        <td>Menandatangani surat perjanjian {{$group->group_type->name}} ({{$group->group_type->initial}}).</td>
                    </tr>
                    <tr>
                        <td class="align-top">3.</td>
                        <td>Menerima uang dana dampingan {{$group->group_type->name}} ({{$group->group_type->initial}}).</td>
                    </tr>
                    <tr>
                        <td class="align-top">4.</td>
                        <td>Mengatur dan mengurus {{$group->group_type->initial}} yang telah dibentuk.</td>
                    </tr>
                    <tr>
                        <td class="align-top">5.</td>
                        <td>Membayar kembali pinjaman yang diterima, sesuai dengan jadwal dan pinjaman yang harus dibayar oleh kelompok.</td>
                    </tr>
                </table>
            </div>
            <div class="page-break">
                <table class="my" width="100%">
                    <tr><td class="right">{{$group->district}}, {{$item->realize_date_display}}</td></tr>
                </table>
                <table width="100%" style="margin-bottom: 20px;">
                    <tr>
                        <td class="align-top">
                            <table class="center">
                                <tr><td>Penerima kuasa,</td></tr>
                                <tr><td>Ketua {{$group->group_type->initial}}</td></tr>
                                <tr><td class="ttd"></td></tr>
                                <tr><td><span class="border-b">{{$head['name']}}</span></td></tr>
                            </table>
                        </td>
                        <td class="align-bottom">
                            <table class="center">
                                <tr><td>Bendahara,</td></tr>
                                <tr><td class="ttd"></td></tr>
                                <tr><td><span class="border-b">{{$treasurer['name']}}</span></td></tr>
                            </table>
                        </td>
                        <td class="align-top">
                            <table class="center">
                                <tr><td>Pemberi kuasa,</td></tr>
                                <tr><td>A.N, anggota (terlampir)</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="page-break">
                <table class="my" width="100%">
                    <tr><td>Lampiran</td></tr>
                    <tr><td>Daftar Anggota Pemberi Kuasa</td></tr>
                    <tr><td>{{$group->group_type->name}} ({{$group->group_type->initial}}) {{\Str::upper($group->name)}}</td></tr>
                </table>
                <table class="table" width="100%">
                    <tr>
                        <td class="center">NO</td>
                        <td class="center">NAMA PEMBERI KUASA</td>
                        <td class="center">ALAMAT</td>
                        <td class="center">TANDA TANGAN</td>
                    </tr>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($members as $member)
                        @if ($member->position == 'anggota')
                            <tr>
                                <td class="center">{{$i++}}</td>
                                <td class="px-15">{{$member->name}}</td>
                                <td class="px-15">{{$group->full_address}}</td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            <div  class="page-break">
                <table class="my center mb-20" width="100%">
                    <tr><td>YAYASAN MAHA BHOGA MARGA</td></tr>
                    <tr><td>{{\Str::upper($group->group_type->name)}}</td></tr>
                    <tr><td>JADWAL PEMBAYARAN ANGSURAN</td></tr>
                </table>
                <table class="mb-20" width="100%">
                    <tr>
                        <td class="align-top" width="100">Nama</td>
                        <td class="align-top" width="10">:</td>
                        <td>{{$head['name']}}</td>
                        <td width="40">{{$group->group_type->initial}}</td>
                        <td width="10">:</td>
                        <td>{{\Str::upper($group->name)}}</td>
                    </tr>
                    <tr>
                        <td class="align-top">Alamat</td>
                        <td class="align-top">:</td>
                        <td colspan="4">{{$group->address}}</td>
                    </tr>
                </table>
                <table width="100%" class="font-15 align-top">
                    <tr>
                        <td width="50%">
                            <table width="100%">
                                <tr>
                                    <td width="100">Pinjaman No</td>
                                    <td width="10">:</td>
                                    <td>{{$item->loan_number}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Realisasi</td>
                                    <td>:</td>
                                    <td>{{$item->realize_date_display}}</td>
                                </tr>
                                <tr>
                                    <td>Tgl. Jatuh Tempo</td>
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
                        <td>
                            <table width="100%">
                                <tr>
                                    <td>Pokok Pinjaman</td>
                                    <td>:</td>
                                    <td>{{$item->realize_loan_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Jangka Waktu</td>
                                    <td>:</td>
                                    <td>{{$loanSystem->tenor}} bulan</td>
                                </tr>
                                <tr>
                                    <td>Suku Bunga</td>
                                    <td>:</td>
                                    <td>{{$loanSystem->interest}}% Per bulan {{$loanSystem->type}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Angsuran</td>
                                    <td>:</td>
                                    <td>{{$item->installment_per_month}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="section no-border">
                    <table class="table2" width="100%">
                        <tr class="font-15">
                            <td rowspan="2" class="center">Tanggal/ Angsuran
                                Ke -</td>
                            <td colspan="5" class="center">PEMBAYARAN</td>
                            <td rowspan="2" class="center">Penerima</td>
                            <td rowspan="2" class="center">Ket.</td>
                        </tr>
                        <tr class="font-15">
                            <td class="center">Pokok</td>
                            <td class="center">Bunga</td>
                            <td class="center">Denda</td>
                            <td class="center">Jumlah</td>
                            <td class="center">Saldo</td>
                        </tr>
                        @foreach ($simulations as $key => $simulation)
                            <tr class="font-13">
                                <td class="center">{{$simulation['date']}}</td>
                                <td class="right px-5">{{$simulation['main']}}</td>
                                <td class="right px-5">{{$simulation['interest']}}</td>
                                <td class="right px-5">{{($key == 0)? '':'0'}}</td>
                                <td class="right px-5">{{$simulation['total']}}</td>
                                <td class="right px-5">{{$simulation['balance']}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </table>
        
                </div>
            </div>
        </div>
    </div>
</body>
</html>