<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
           
            //alias de BigIncrements 
            //metodo BigIncrements crea un auto-incrementing (ideal para nuevos registros 
            //y que se vayan creando de forma consecutiva) es de tipo UNSIGNED BIGINT 
            //crea equivalente a un Primary key
            $table->id();

            //Metodo String crea un varchar(en SQL). Se lo usa para titulo o nombre de usuario. 
            //La diferencia entre varchar(tiene un limite) y text(Guarda mucho texto como una noticia)
            $table->string('titulo');
            
            $table->text('description');
            $table->string('imagen'); // retorda 40 digitos o id nombre de la imagen

            //Este metodo crea una columna de tipo UNSIGNED BIGINT. Se lo usa para relacionar con otra tabla.
            //En SQL se tiene que tener el mismo tipo de dato con la misma extension para 
            //poder crear una llave foranea de otra tabla. Con esto podes crear una relacion.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');//Cuando un usuario elimine su cuenta se va a llevar sus posts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts'); //Si le damos rollback a la migracion elimina la tabla completa
    }
};
