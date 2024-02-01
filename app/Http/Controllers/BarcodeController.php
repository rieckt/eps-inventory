<?php

namespace App\Http\Controllers;

use Milon\Barcode\DNS1D;

class BarcodeController extends Controller
{
    public function show($barcode)
    {
        $dns1d = new DNS1D();
        return $dns1d->getBarcodePNG($barcode, 'C39+', 3, 33, array(1, 1, 1), true);
    }
}
