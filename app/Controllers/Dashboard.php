<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Welcome back, ".$session->get('user_nama');
        echo ", ";
        echo "<a class='nav-link' href=".base_url('Authentication/logout').">
        <button >Log Out</button></a>";
    }
}
