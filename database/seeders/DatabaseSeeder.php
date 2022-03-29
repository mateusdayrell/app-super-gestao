<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\User::factory(10)->create();

        SiteContato::factory(10)->create();

        // $this->call([
        //     FornecedorSeeder::class,
        //     SiteContatoSeeder::class
        // ]);
    }
}
