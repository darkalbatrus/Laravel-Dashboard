<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function edit($id)
    {
        return view('admin.edit');
    }
    public function update(Request $request, $id)
    {
        return view('admin.create');
    }
    public function delete($id)
    {
        return view('admin.create');
    }
}
