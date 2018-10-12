<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','100');
            $table->text('content');
            $table->timestamps();
        });

        $article = new \App\Article();
        $article->title = "FIRST PASSENGER ON LUNAR BFR MISSION";
        $article->content = "On September 17, 2018, SpaceX announced fashion innovator and globally recognized art curator Yusaku Maezawa will be the company’s first private passenger flight around the Moon for 2023. 
                            To date, only 24 people have visited the Moon, with the last of them flying in 1972. This first private lunar passenger flight, featuring a fly-by of the Moon as part of a weeklong mission, 
                            will help fund development of the BFR vehicle, an important step in enabling access for everyday people who dream of flying to space. Watch a replay of the announcement below.";


        $article->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
