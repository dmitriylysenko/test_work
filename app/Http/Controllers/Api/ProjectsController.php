<?php
/**
 * Created by PhpStorm.
 * User: dmitriy
 * Date: 27.09.18
 * Time: 15:45
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectsController extends Controller
{

  public function one($id)
  {
    return response()->json(Project::find($id));
  }

  public function all()
  {
    return response()->json(Project::all());
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name'        => 'string|max:255',
      'description' => 'string|max:255',
      'statuses'    => 'required',
    ]);

    $project = Project::find($id);
    $project->update($request->all());

    return $project;
  }

  public function destroy($id)
  {
    Project::find($id)->delete();
    return response()->json([], Response::HTTP_NO_CONTENT);
  }
}