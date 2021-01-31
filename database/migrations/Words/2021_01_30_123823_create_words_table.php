<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('words');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
        DB::statement("
        INSERT INTO `words` (`words`) VALUES
        ('ant'),
        ('bat'),
        ('bear'),
        ('beetle'),
        ('bird'),
        ('buffalo'),
        ('butterfly'),
        ('cat'),
        ('chameleon'),
        ('cockroach'),
        ('cow'),
        ('crab'),
        ('cricket'),
        ('crocodile'),
        ('deer'),
        ('dog'),
        ('dolphin'),
        ('dove'),
        ('dragonfly'),
        ('elephant'),
        ('goldfish'),
        ('grasshopper'),
        ('hedgehog'),
        ('hummingbird'),
        ('kitten'),
        ('hippotamus'),
        ('jellyfish'),
        ('kitten'),
        ('lamb'),
        ('mosquito'),
        ('hummingbird'),
        ('ostrich'),
        ('otter'),
        ('mouse'),
        ('parrot'),
        ('rhinoceros'),
        ('seagull'),
        ('raven'),
        ('shrimp'),
        ('stingray'),
        ('whale'),
        ('weasel'),
        ('turkey'),
        ('walrus'),
        ('sparrow'),
        ('snake'),
        ('scorpion'),
        ('rooster'),
        ('lizard'),
        ('leopard')
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
