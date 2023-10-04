<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
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

        $kelas = $this->kelasModel->getKelas();

        // session();
        $data = [
            'kelas' => $kelas,
            'title' => 'Create User',
            'validation' => \Config\Services::validation()
        ];

        return view('create_user', $data);
    }

    public function store()
    {
        if(!$this->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'npm' => 'required|numeric|is_unique[user.npm]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/create')->withInput();
        }    

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ]);

        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm')
        // ];
        return redirect()->to('/user');
    }
}