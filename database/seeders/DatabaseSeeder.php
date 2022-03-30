<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SiteContato;
use App\Models\MotivoContato;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // USING FACTORY
        SiteContato::factory(10)->create();
        // EXAMPLE
        // App\Models\User::factory(10)->create();

        //USING SEEDER
        // $this->call([
        //     FornecedorSeeder::class,
        //     SiteContatoSeeder::class,
        // ]);
        $this->call(MotivoContato::class);
    }
}
