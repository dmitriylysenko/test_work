<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 28.09.2018
 * Time: 16:15
 */

namespace Tests\Unit\Api;


use App\Client;
use Tests\TestCase;

class ClientsTest extends TestCase
{

  public function testGetClient(): void
  {
    json_encode(Client::all());
    $this->json('get', '/api/clients/1', [])
      ->assertStatus(200)
      ->assertJsonStructure([
        'id',
        'first_name',
        'last_name',
        'email',
        'created_at',
        'updated_at'
      ]);
  }

  public function testGetClients(): void
  {
    json_encode(Client::all());
    $this->json('get', '/api/clients', [])
      ->assertStatus(200)
      ->assertJsonStructure([
        '*' => [
          'id',
          'first_name',
          'last_name',
          'email',
          'created_at',
          'updated_at'
        ]
      ]);
  }

  public function testRequirePassword()
  {
    $this->json('POST', '/api/clients')
      ->assertStatus(422)
      ->assertJson([
        'message' => 'The given data was invalid.',
        'errors'  => [
          'password' => ['The password field is required.']
        ]
      ]);
  }

  public function testWrongEmail()
  {
    $this->json('POST', '/api/clients', [
      'first_name' => 'first_name',
      'last_name'  => 'last_name',
      'email'      => 'email@com',
      'password'   => 'passw0rd'
    ])
      ->assertStatus(422)
      ->assertJson([
        'message' => 'The given data was invalid.',
        'errors'  => [
          'email' => ['The email must be a valid email address.']
        ]
      ]);
  }

  public function testsDeleteClient()
  {
    $client = factory(Client::class)->create([
      'first_name' => 'first_name',
      'last_name'  => 'last_name',
      'email'      => 'email@email.com',
      'password'   => 'passw0rd'
    ]);

    $this->json('DELETE', '/api/clients/' . $client->id, [])
      ->assertStatus(204);
  }

}