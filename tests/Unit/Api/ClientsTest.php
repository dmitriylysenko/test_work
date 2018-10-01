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
  public function testGetClients(): void
  {
    json_encode(Client::all());
    $this->json('get', '/api/clients', [])->assertStatus(200);
  }
}