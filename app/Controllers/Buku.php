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

        // jika buku tidak ada di daftar
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku ' . $slug . ' tidak ditemukan dalam daftar.');
        }

        return view('buku/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Add | Books',
        ];

        return view('buku/tambah', $data);
    }

    public function simpan()
    {
        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->bukuModel->save([
            'judul' => $this->request->getVar('title'),
            'penulis' => $this->request->getVar('writer'),
            'slug' => $slug,
            'sampul' => $this->request->getVar('cover')
        ]);

        session()->setFlashdata('pesan', 'Data buku telah ditambahkan.');

        return redirect()->to('/buku');
    }
}
