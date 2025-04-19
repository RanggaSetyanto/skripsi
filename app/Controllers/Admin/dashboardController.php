<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\JamaahModel;
use App\Models\PaketUmrahModel;
use App\Models\PembayaranModel;

class DashboardController extends BaseController
{
    public function index(): string
    {
        $pendaftaranModel = new PendaftaranModel();
        $jamaahModel = new JamaahModel();
        $paketModel = new PaketUmrahModel();
        $pembayaranModel = new PembayaranModel();

        $data = [
            'totalPendaftaran' => $pendaftaranModel->countAll(),
            'totalJamaah'      => $jamaahModel->countAll(),
            'totalPaket'       => $paketModel->countAll(),
            'totalPembayaran'  => $pembayaranModel->countAll(),
        ];

        return view('admin/dashboard/index', $data);
    }
}
