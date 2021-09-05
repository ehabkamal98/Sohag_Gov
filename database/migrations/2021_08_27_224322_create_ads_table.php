<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('photo')->nullable();
            $table->string('link')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
        });

        DB::table('ads')->insert(
            array(
                [
                    'name' => 'مساحة اعلانية رقم 1 - الصفحة الرئيسية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 2 - الصفحة الرئيسية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 3 - الصفحة الرئيسية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 4 - الصفحة الرئيسية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 5 - الصفحة الرئيسية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 6 - الصفحة الرئيسية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 7 - الصفحات الداخلية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 8 - الصفحات الداخلية',
                    'photo'=>'default.jpg',
                ],
                [
                    'name' => 'مساحة اعلانية رقم 9 - الصفحات الداخلية',
                    'photo'=>'default.jpg',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
