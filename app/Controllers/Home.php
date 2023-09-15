<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
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
}
