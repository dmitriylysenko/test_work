<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 26.09.2018
 * Time: 21:42
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password'
  ];
  protected $hidden = ['password'];

  public static function new($firstName, $lastName, $email, $password): self
  {
    return static::create([
      'first_name' => $firstName,
      'last_name'  => $lastName,
      'email'      => $email,
      'password'   => $password
    ]);
  }
}