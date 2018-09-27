<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 27.09.18
 * Time: 15:45
 */

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;

class ProjectsController
{
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'first_name' => 'string|max:255',
      'last_name' => 'string|max:255',
      'email' => 'required|email',
      'password' => 'required'
    ]);


    $project = Project::find($id);

    $project->update($request->all());

    return $project;
  }
}