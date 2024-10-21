<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenulisModel;
use CodeIgniter\HTTP\ResponseInterface;

class Penulis extends BaseController
{
    protected $penulisModel;
    public function __construct() {
        $this->penulisModel = new PenulisModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Penulis',
            'authors' => $this->penulisModel->findAll(),
        ];
        return view('penulis/index', $data);
    }

    public function create() {
        $data = [
            'title' => 'Add Author'
        ];
        return view('penulis/form', $data);
    }
}
