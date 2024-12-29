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

    public function edit($id)
    {
        $user = UserModel::find($id);
        if (!$user) {
            return redirect()->route('datauser')->withErrors(['User tidak ditemukan.']);
        }

        return view('data_user.edit', ['user' => $user]);
    }

    // Memproses pembaruan data user
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'role' => 'required|in:user,admin',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = UserModel::find($id);
        if (!$user) {
            return redirect()->route('datauser')->withErrors(['User tidak ditemukan.']);
        }

        $user->fullname = $request->input('fullname');
        $user->role = $request->input('role');

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('picture/accounts'), $filename);
            $user->gambar = $filename;
        }

        $user->save();

        return redirect()->route('datauser')->with('success', 'Data user berhasil diperbarui.');
    }

    function delete(Request $request)
    {
      UserModel::where('id', $request->id)->delete();
      Session::flash('success', 'Data berhasil dihapus');

      return redirect('/datauser');
    }
}
