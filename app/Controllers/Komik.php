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
    return view('komik/detail', $data);
  }
}
