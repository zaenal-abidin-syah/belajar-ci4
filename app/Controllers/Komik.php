<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
  protected $komikModel;
  public function __construct()
  {
    $this->komikModel = new KomikModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Daftar Komik',
      'komik' => $this->komikModel->getKomik()
    ];
    // connect db manual
    // $db = \Config\Database::connect();
    // $komik = $db->query("SELECT * FROM komik");
    // foreach ($komik->getResultArray() as $row) {
    //   d($row);
    // }
    return view('komik/index', $data);
  }
  public function detail($slug)
  {
    $data = [
      'title' => 'Daftar Komik',
      'komik' => $this->komikModel->getKomik($slug)
    ];
    if (empty($data['komik'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan');
    }
    return view('komik/detail', $data);
  }
  public function create()
  {
    session();
    $data = [
      'title' => 'Form Tambah Data Komik',
      // 'validation' => $this->validator
      // \Config\Services::validation()
    ];
    return view('komik/create', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'judul' => 'required|is_unique[komik.judul]',
      'penulis' => 'required',
      'penerbit' => 'required',
      'sampul' => 'required'
    ])) {
      $validation = \Config\Services::validation();
      $error = $validation->listErrors();
      session()->setFlashdata('error', $error);
      // dd($validation);
      return redirect()->to('/komik/create')->withInput();
    }
    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $this->request->getVar('sampul')
    ]);
    session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    return redirect()->to('/komik');
  }
}
