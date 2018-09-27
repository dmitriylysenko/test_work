<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 27.09.18
 * Time: 14:44
 */

namespace App\Http\Controllers\Api;


use App\Client;
use Illuminate\Http\Request;

class ClientsController
{
  public function create()
  {
    
  }
  public function one($id)
  {
    return response()->json(Client::find($id));
  }

  public function all()
  {
    return response()->json(Client::all());
  }

  public function destroy($id)
  {
    Client::find($id)->delete();
    return response()->json(['message' => "success remove client: $id"]);
  }
}