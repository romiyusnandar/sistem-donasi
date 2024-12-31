<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  function index()
  {
    return view('halaman_auth/login');
  }

  public function login(Request $request)
  {
      $request->validate([
          'email' => 'required|email',
          'password' => 'required'
      ], [
          'email.required' => 'Email harus diisi',
          'email.email' => 'Format email salah',
          'password.required' => 'Password harus diisi',
      ]);

      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
          if (Auth::user()->email_verified_at != null) {
              // Simpan data pengguna ke dalam session
              $request->session()->put([
                  'user_id' => Auth::user()->id,
                  'user_name' => Auth::user()->fullname,
                  'user_email' => Auth::user()->email,
                  'user_role' => Auth::user()->role,
              ]);

              if (Auth::user()->role == 'admin') {
                  return redirect()->route('admin')->with('success', 'Login berhasil');
              } else if (Auth::user()->role == 'user') {
                  return redirect()->route('home')->with('success', 'Login berhasil');
              }
          } else {
              Auth::logout();
              return redirect()->route('login')->withErrors('Email belum diverifikasi, silahkan cek email anda');
          }
      } else {
          return redirect()->route('login')->withErrors('Email atau password salah');
      }
  }
  function create()
  {
    return view('halaman_auth/register');
  }
  function register(Request $request)
  {
    $str = Str::random(100);

    $request->validate([
      'fullname' =>'required|min:5',
      'email' =>'required|unique:users|email',
      'password' => 'required|min:8',
      'gambar' => 'required|image|mimes:jpeg,png,jpg|file',
    ], [
      'fullname.required' => 'Nama lengkap harus diisi',
      'fullname.min' => 'Nama lengkap minimal 5 karakter',
      'email.required' => 'Email harus diisi',
      'email.unique' => 'Email sudah terdaftar',
      'email.email' => 'Format email salah',
      'password.required' => 'Password harus diisi',
      'password.min' => 'Password minimal 8 karakter',
      'gambar.required' => 'Gambar harus diisi',
      'gambar.image' => 'File yang diupload harus gambar',
      'gambar.mimes' => 'Format gambar yang diperbolehkan hanya JPEG, PNG, dan JPG',
      'gambar.file' => 'File yang diupload harus berupa gambar',
    ]);

    $gambar_file = $request->file('gambar');
    $gambar_ekstensi = $gambar_file->extension();
    $nama_gambar = date('ymdhis') . '.' . $gambar_ekstensi;
    $gambar_file->move(public_path('picture/accounts'), $nama_gambar);

    $infoRegister = [
      'fullname' => $request->fullname,
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'gambar' => $nama_gambar,
      'verify_key' => $str,
    ];

    User::create($infoRegister);

    $details = [
      'name' => $request->fullname,
      'role' => 'user',
      'datetime' => date('Y-m-d H:i:s'),
      'website' => 'Donasi Kita',
      'url' => 'http://' . request()->getHttpHost() . '/' . 'verify/'. $infoRegister['verify_key'],
  ];

    Mail::to($infoRegister['email'])->send(new AuthMail($details));

    return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silahkan cek email anda untuk verifikasi');
  }

  function verify($key)
  {
    $keyCheck = User::select('verify_key')
    ->where('verify_key', $key)
    ->exists();

    if ($keyCheck) {
      $user = User::where('verify_key', $key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

      return redirect()->route('login')->with('success', 'Email berhasil diverifikasi, silahkan login');
    } else {
      return redirect()->route('login')->withErrors('Key verifikasi tidak valid');
    }
  }

  function logout(Request $request)
  {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/')->with('success', 'Anda telah berhasil logout');
  }
}
