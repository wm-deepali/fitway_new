<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Adminrolescontroller extends Controller
{
    /**
     * Display Admin Roles / Manage Sub Admins page.
     */
    public function index()
    {
        return view('admin.admin-roles-setting.index');
    }

    /**
     * Display Create Sub Admin page.
     */
    public function create()
    {
        return view('admin.admin-roles-setting.create');
    }
}