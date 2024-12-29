<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    public $table = 'users';
    public $fillable = [
      'fullname',
      'email',
      'password',
      'gambar',
      'verify_key',
      'role'
  ];
}
