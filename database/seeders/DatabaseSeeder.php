<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(3)->create();
        User::create([
            'username' => "admin",
            'password' => '123',
            'level_user' => '1',
            'remember_token' => Str::random(10),
        ]);
        $this->call(PenyewaSeeder::class);
        $this->call(MobilSeeder::class);
        // $this->call(TiketSeeder::class);
    }
}
