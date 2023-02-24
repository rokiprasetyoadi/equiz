<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        $data['kata'] = "Roki Prasetyo Adi";
        echo view('about', $data);
    }

    public function tes()
    {
        echo "Halaman auto routes";
    }
}
