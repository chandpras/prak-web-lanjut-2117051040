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
            'npm' => 'required|is_unique[user.npm]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/create')->withInput();
        }

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $name = $foto->getRandomName();

        if($foto->move($path, $name)) 
        {
            $foto = base_url($path . $name);
        }

        $this->userModel->saveUser([
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
            'foto'      => $foto
        ]);
        return redirect()->to('/user');
    }

    public function edit($id)
    {

        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title'     => 'Edit User',
            'user'      => $user,
            'kelas'     => $kelas,
            'validation' => \Config\Services::validation()
        ];

        return view('edit_user', $data);
    }

    public function update($id)
    {
        if(!$this->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'npm' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/' . $id . '/edit')->withInput();
        }

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');

        $data = [
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
        ];

        if($foto->isValid()){
            $name = $foto->getRandomName();

            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);

                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);

        if(!$result){
            return redirect()->back()->withInput()->with('error', 'gagal mengubah data');
        }

        return redirect()->to(base_url('/user'));
    }

    public function destroy($id)
    {
        $result = $this->userModel->deleteUser($id);

        if(!$result){
            return redirect()->back()->with('error', 'gagal menghapus data');
        }

        return redirect()->to(base_url('/user'))->with('success', 'berhasil menghapus data');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title'     => 'Profil User',
            'user'      => $user,
        ];

        return view('profile', $data);
    }
}