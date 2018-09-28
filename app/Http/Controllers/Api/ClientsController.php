<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 27.09.18
 * Time: 14:44
 */

namespace App\Http\Controllers\Api;


use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientsController extends Controller
{
  public function create(Request $request)
  {
    $this->validate($request, [

      'first_name' => 'string|max:255',
      'last_name'  => 'string|max:255',
      'email'      => 'string|email',
      'password'   => 'string|required'
    ]);


    $client = new Client($request->all());

    $client->saveOrFail();

    return response()->json([$client], Response::HTTP_CREATED);
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
    return response()->json([], Response::HTTP_NO_CONTENT);
  }
}