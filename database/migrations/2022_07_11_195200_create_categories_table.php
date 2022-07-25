<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('en');
            $table->string('es');
            $table->timestamps();
        });

    //     $categories = ['Sport', 'Libri', 'Musica', 'Giardino', 'Cucina', 'Giochi', 'Abbigliamento', 'Elettrodomestici', 'Telefonia', 'Motori'
    // ];

    $categories = [

        [
            'name' => 'Sport',
            'en' => 'Sport',
            'es' => 'Deporte',
            
        ],

        [
            'name' => 'Libri',
            'en' => 'Books',
            'es' => 'Libros',
            
        ],
 
        [
            'name' => 'Musica',
            'en' => 'Music',
            'es' => 'Música',
            
        ],

        [
            'name' => 'Giardino',
            'en' => 'Garden',
            'es' => 'Jardín',
            
        ],

        [
            'name' => 'Cucina',
            'en' => 'Kitchen',
            'es' => 'Cocina',
            
        ],

        [
            'name' => 'Giochi',
            'en' => 'Games',
            'es' => 'Juegos',
            
        ],

        [
            'name' => 'Abbigliamento',
            'en' => 'Clothing',
            'es' => 'Ropa',
            
        ],

        [
            'name' => 'Elettrodomestici',
            'en' => 'Domestic appliances',
            'es' => 'Usos domésticos',
            
        ],

        [
            'name' => 'Telefonia',
            'en' => 'Telephony',
            'es' => 'Telefonìa',
            
        ],

        [
            'name' => 'Motori',
            'en' => 'Vehicles',
            'es' => 'Motores',
        ],

        
    ];

        foreach ($categories as $category){
            Category::create([
                'name'=>$category['name'], 
                'en' =>$category['en'],
                'es' =>$category['es'],
                ]);    
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
