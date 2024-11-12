<?php

// namespace CodeIgniter\App\Controllers;

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function index()
    {
        return view('admin/dashboard');
    }

    // Outros métodos específicos para o painel de administração
}