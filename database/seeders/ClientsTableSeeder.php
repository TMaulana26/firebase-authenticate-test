<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => 'taget sso 1',
            'client_id' => Str::uuid(),
            'client_secret' => Str::random(32),
            'redirect_uri' => 'http://taget-sso-1.test/sso/callback'
        ]);
    }
}
