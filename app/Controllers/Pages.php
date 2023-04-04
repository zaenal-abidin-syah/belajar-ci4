<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {
    // return view('pages/home');
    $data = [
      'title' => 'Home | WEB PROGRAMMING',
      'test' => ['satu', 'dua', 'tiga']
    ];
    return view('pages/home', $data);
  }
  public function about()
  {
    $data = [
      'title' => 'About | WEB PROGRAMMING'
    ];
    return view('pages/about', $data);
  }
  public function contact()
  {
    $data = [
      'title' => 'Contact Us | WEB PROGRAMMING',
      'alamat' => [
        [
          'tipe' => 'Rumah',
          'alamat' => 'jl. abc No. 12',
          'kota' => 'Surabaya'
        ],
        [
          'tipe' => 'Kantor',
          'alamat' => 'jl. gfh No. 25',
          'kota' => 'Bangkalan'
        ]
      ]

    ];
    return view('pages/contact', $data);
  }
}
