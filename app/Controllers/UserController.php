<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function profile()
    {
        $data = [
            'nama' => 'Chandra Prasetya Putra',
            'kelas' => 'D',
            'npm' => '2117051040'
        ];
        return view('profile', $data);
    }

    public function create()
    {
        $kelas = [
            [
                'id' => 1,
                'nama_kelas' => 'A'
            ],
            [
                'id' => 2,
                'nama_kelas' => 'B'
            ],
            [
                'id' => 3,
                'nama_kelas' => 'C'
            ],
            [
                'id' => 4,
                'nama_kelas' => 'D'
            ], 
        ];

        $data = [
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ];
        return view('profile', $data);
    }
}