<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function getRegencies()
    {
        $path = public_path('json/bps-bali.json');
        $json = json_decode(file_get_contents($path), true);
        return $json;
    }

    public function getAmountDisplay($amount) 
    {
        $currency = 'Rp';
        return $currency . ' '. number_format($amount, 2, '.', ',');
    }
}
