<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 10); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();

            //create relation with table produtos
            Schema::table('produtos', function (Blueprint $table) {
                $table->unsignedBigInteger('unidade_id'); //add collum
                $table->foreign('unidade_id')->references('id')->on('unidades'); //add foreign key
            });

            //create relation with table produto_detalhes
            Schema::table('produto_detalhes', function (Blueprint $table) {
                $table->unsignedBigInteger('unidade_id');
                $table->foreign('unidade_id')->references('id')->on('unidades');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        //drop relation with table produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        //drop relation with table produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        //drop table
        Schema::dropIfExists('unidades');
    }
};
