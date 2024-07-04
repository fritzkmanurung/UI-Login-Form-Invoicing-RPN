<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Invoice extends BaseController
{
    public function index()
    {
        return view('list-invoice');
    }

    public function create()
    {
        return view('tambah');
    }
}
