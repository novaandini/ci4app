<?php

namespace App\Controllers;

use App\Models\BukuModels;

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModels();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | Books',
            'books' => $this->bukuModel->getBuku()
        ];

        /* 
            cara konek db tanpa model
            $db = \Config\Database::connect();
            $buku = $db->query("SELECT * FROM buku");
            foreach ($buku->getResultArray() as $row) {
                d($row);
            } 
        */
        return view('buku/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail | Books',
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        return view('buku/detail', $data);
    }
}
