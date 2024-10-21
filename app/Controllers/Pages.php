<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $faker = \Faker\Factory::create('id_ID');
        // dd($faker->name());
        $data = [
            'title' => 'Halaman Home',
            'nama' => 'Andini'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Halaman About'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Halaman Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Denpasar Selatan',
                    'kota' => 'Kota Denpasar'
                ], 
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Denpasar Timur',
                    'kota' => 'Kota Denpasar'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
