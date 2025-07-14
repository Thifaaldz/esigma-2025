<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranSim;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PendaftaranSimController extends Controller
{
    public function cetak($id)
    {
        $data = PendaftaranSim::findOrFail($id);

        $pdf = Pdf::loadView('pdf.bukti-pendaftaran', compact('data'));
        return $pdf->stream('bukti-pendaftaran-sim-'.$data->nik.'.pdf');
    }
}
