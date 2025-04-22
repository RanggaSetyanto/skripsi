<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PaketUmrahModel;

class PaketumrohController extends BaseController
{
    public function index()
    {
        $model = new PaketUmrahModel();
        $data['paket'] = $model->findAll();

        return view('User/paketumrohstaf/index', $data);
    }
}
