<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Work withou FILABLE {
        $fornecedor = new Fornecedor();

        $fornecedor->nome = 'Fornecedor de energia';
        $fornecedor->site = 'maisenergia.com';
        $fornecedor->email = 'maisenergia@contato.com';
        $fornecedor->uf = 'PI';
        $fornecedor->save();
        // }

        //OR

        // needs FILABLE:
        Fornecedor::create([
            'nome' => 'Fornecedor de papel',
            'site'=> 'maispapel.com',
            'email'=> 'maispapel@contato.com',
            'uf'=> 'ES'
        ]);

        //OR

        DB::table('fornecedores')->insert([
            'nome'=> 'Fornecedor de agua',
            'site'=> 'maisagua.com',
            'email'=> 'maisagua@contato.com',
            'uf'=> 'PR'
        ]);
    }
}
