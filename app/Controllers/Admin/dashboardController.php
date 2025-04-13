<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class dashboardController extends BaseController
{
    public function index(): string
    {
        return view('admin/dashboard/index');
    }
}
