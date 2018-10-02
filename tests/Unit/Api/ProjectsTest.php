<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 02.10.2018
 * Time: 20:26
 */

namespace Tests\Unit\Api;


use App\Project;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
  public function testGetProject(): void
  {
    json_encode(Project::all());
    $this->json('get', '/api/projects/1', [])
      ->assertStatus(200)
      ->assertJsonStructure([
        'name',
        'description',
        'statuses'
      ]);
  }

  public function testGetProjects(): void
  {
    json_encode(Project::all());
    $this->json('get', '/api/projects', [])
      ->assertStatus(200)
      ->assertJsonStructure([
        '*' => [
          'name',
          'description',
          'statuses'
        ]
      ]);
  }

  public function testRequireStatuses()
  {
    $this->json('POST', '/api/projects/1')
      ->assertStatus(422)
      ->assertJson([
        'message' => 'The given data was invalid.',
        'errors'  => [
          'statuses' => ['The statuses field is required.']
        ]
      ]);
  }

  public function testWrongStatuses()
  {
    $this->json('POST', '/api/projects/1', [
      'name'        => 'name',
      'description' => 'description',
      'statuses'    => 'wrong_status'
    ])
      ->assertStatus(400)
      ->assertJson([
        'message' => 'Bad Request',
      ]);
  }

  public function testsDeleteProject()
  {
    $project = factory(Project::class)->create([
      'name'        => 'name',
      'description' => 'description',
      'statuses'    => 'on_hold'
    ]);

    $this->json('DELETE', '/api/projects/' . $project->id, [])
      ->assertStatus(204);
  }
}