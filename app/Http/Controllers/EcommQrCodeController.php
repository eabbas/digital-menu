<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ecomm;

use App\Models\ecomm_qrCode;



class EcommQrCodeController extends Controller
{
   
      public function load(ecomm $ecomm, string $slug){
        return view('client.ecomm.ecomm_menu', ['ecomm' => $ecomm, 'slug' => $slug]);

      }
}
