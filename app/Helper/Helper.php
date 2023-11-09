<?php
namespace App\Helper;
use Session;
use Auth;
use Storage;

class Helper {
    public static function getAmountDisplay($amount)
    {
        $currency = 'Rp';
        if (($amount == 0)) {
            return $amount;
        } else {
            return $currency . ' '. number_format($amount, 2, ',', '.');
        }
    }

    public static function getPercentDisplay($val)
    {
        $unit = '%';
        if (($val == 0)) {
            return $val;
        } else {
            return number_format($val, 2, ',', '.') . ' '. $unit;
        }
    }

    public static function toRomawi($n)
    {
        if ($n > 3000) {
            return $n;
        }
        $hasil = '';
        $iromawi = array('','I','II','III','IV','V','VI','VII','VIII','IX','X',20=>'XX',30=>'XXX',40=>'XL',50=>'L',
        60=>'LX',70=>'LXX',80=>'LXXX',90=>'XC',100=>'C',200=>'CC',300=>'CCC',400=>'CD',500=>'D',600=>'DC',700=>'DCC',
        800=>'DCCC',900=>'CM',1000=>'M',2000=>'MM',3000=>'MMM');
        if(array_key_exists($n,$iromawi)){
        $hasil = $iromawi[$n];
        }elseif($n >= 11 && $n <= 99){
        $i = $n % 10;
        $hasil = $iromawi[$n-$i] . self::toRomawi($n % 10);
        }elseif($n >= 101 && $n <= 999){
        $i = $n % 100;
        $hasil = $iromawi[$n-$i] . self::toRomawi($n % 100);
        }else{
        $i = $n % 1000;
        $hasil = $iromawi[$n-$i] . self::toRomawi($n % 1000);
        }
        return $hasil;
    }

    public static function canAccess($val)
    {
        $isSuperAdmin = (\Auth::user()->role_id == 0) ? true : false;
        $permisions = Session::get('permissions');
        if (!$permisions) {
            $permisions = array();
        }
        return ($isSuperAdmin) ? true : (in_array($val, $permisions));
    }

    public static function isSuperAdmin()
    {
        return (Auth::user()->role_id == 0) ? true:false;
    }

    public static function getApproverArr()
    {
        $approverArr = array();
        $isSuperAdmin = self::isSuperAdmin();
        if (!$isSuperAdmin) {
            $permisions = Session::get('permissions');
            if (count($permisions) > 0) {
                foreach ($permisions as $val) {
                    if (stripos($val,':')) {
                        $arr = explode(':', $val);
                        array_push($approverArr, $arr[1]);
                    }
                }
            }
        }
        return array_unique($approverArr);
    }

    public static function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = self::penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = self::penyebut($nilai/10)." puluh". self::penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . self::penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = self::penyebut($nilai/100) . " ratus" . self::penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . self::penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = self::penyebut($nilai/1000) . " ribu" . self::penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = self::penyebut($nilai/1000000) . " juta" . self::penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = self::penyebut($nilai/1000000000) . " milyar" . self::penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = self::penyebut($nilai/1000000000000) . " trilyun" . self::penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
    
    public static function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(self::penyebut($nilai));
        } else {
            $hasil = trim(self::penyebut($nilai));
        }     		
        return $hasil . ' rupiah';
    }

    public static function formatDateIndo($date) {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $date);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    public static function getBanks()
    {
        $path = public_path('json/bank.json');
        $json = json_decode(file_get_contents($path), true);
        return $json;
    }

    public static function getMemberNumber($val)
    {
        return sprintf("%06d", $val);
    }

    public static function getNumberString($val)
    {
        return sprintf("%06d", $val);
    }

    public static function generateRandomString($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function uploadImage($path, $image, $imageName) {
		Storage::disk('public')->putFileAs($path, $image, $imageName, 'public');
	}
}
