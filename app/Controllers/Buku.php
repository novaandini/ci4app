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
            'validation' => \Config\Services::validation()
        ];

        return view('buku/tambah', $data);
    }

    public function simpan()
    {
        // validasi input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                    'is_unique' => 'Buku tersebut sudah terdaftar'
                ]
            ],
            'writer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penulis harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('buku/tambah')->withInput()->with('validation', $validation);
        };

        $sampul = $this->request->getFile('cover');
        $sampul->move('img');
        $namaSampul = $sampul->getName();

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->bukuModel->save([
            'judul' => $this->request->getVar('title'),
            'penulis' => $this->request->getVar('writer'),
            'slug' => $slug,
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data buku telah ditambahkan.');

        return redirect()->to('/buku');
    }

    public function hapus($id)
    {
        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data buku telah terhapus');
        return redirect()->to('/buku');
    }
}
