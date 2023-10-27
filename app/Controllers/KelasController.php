<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class KelasController extends BaseController
{
    public $kelasModel;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Kelas',
            'kelas' => $this->kelasModel->getKelas(),
        ];
        return view('list_kelas', $data);
    }

    public function create()
    {
        $data  = [
            'title' => 'Create kelas',
            'validation' => \Config\Services::validation()
        ];
        return view('create_kelas', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas]',
            'kapasitas_kelas' => 'required',
        ])) {
            return redirect()->to('/kelas/create')->withInput();
        }

        $this->kelasModel->saveKelas([
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'kapasitas_kelas' => $this->request->getVar('kapasitas_kelas'),
        ]);
        return redirect()->to('/kelas');
    }

    public function edit($id)
    {
        $kelas = $this->kelasModel->getKelas($id);
        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
            'validation' => \Config\Services::validation()

        ];
        return view('edit_kelas', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kelas' => 'required',
            'kapasitas_kelas' => 'required',
        ])) {
            return redirect()->to('/kelas/' . $id . '/edit')->withInput();
        }
        
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'kapasitas_kelas' => $this->request->getVar('kapasitas_kelas'),
        ];
        $result = $this->kelasModel->updateKelas($data, $id);

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'gagal mengubah data');
        }

        return redirect()->to(base_url('/kelas'));
    }

    public function destroy($id)
    {
        try {
            $this->kelasModel->deleteKelas($id);
            return redirect()->to(base_url('/kelas'));
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'Database error: ' . $e->getMessage());
            $validation = service('validation');
            $validation->setError('failed', 'gagal menghapus data, foreign key digunakan di tabel user');
            return redirect()->back()->with('validation', $validation);
        }
        return redirect()->to(base_url('/kelas'))->with('success', 'berhasil menghapus data');
    }

    public function show($id)
    {
        $kelas = $this->kelasModel->getKelas($id);
        $data = [
            'title' => 'List anggota kelas',
            'kelas' => $kelas,
        ];
        return view('list_kelas', $data);
    }
}
