<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Verifikasi akun anda</title>
</head>
<body>
  <p>
    Halo <b>{{$details['name']}}</b>!
  </p>
  <br>
  <p>
    Brikut ini adalah data anda :
  </p>
  <table>
    <tr>
      <td>Full Name</td>
      <td>:</td>
      <td>{{$details['name']}}</td>
    </tr>
    <tr>
      <td>Role</td>
      <td>:</td>
      <td>{{$details['role']}}</td>
    </tr>
    <tr>
      <td>Website</td>
      <td>:</td>
      <td>{{$details['website']}}</td>
    </tr>
    <tr>
      <td>Tanggal Registrasi</td>
      <td>:</td>
      <td>{{$details['datetime']}}</td>
    </tr>
    <br><br><br>
    <center>
      <h3>Verifikasi akun anda disini!</h3>
      <a href="{{$details['url']}}" style="text-decoration: none; color: rgb(255, 255, 255); padding: 9px; background-color: #3498db;">
        Verifikasi
      </a>
      <br><br><br>
      <p>&copy; Copy right @ 2024 | Donasi Kita | Kelompok 5</p>
    </center>
  </table>
</body>
</html>