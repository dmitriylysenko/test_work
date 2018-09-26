<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Client::class, 10)->create();
    }
}
