<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataUser extends Controller
{
    function index()
    {
      $data = UserModel::all();
      return view('data_user.index', ['users' => $data]);
    }

    function create()
    {
      return view('data_user.create');
    }
    function edit($id)
    {
      $data = UserModel::find($id);
      return view('data_user.edit', ['user' => $data]);
    }
    function delete(Request $request)
    {
      UserModel::where('id', $request->id)->delete();
      Session::flash('success', 'Data berhasil dihapus');

      return redirect('/data_user');
    }
}
