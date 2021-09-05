<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('order');
            $table->timestamps();
        });
        DB::table('categories')->insert(
            array(
                [
                    'name' => 'افتتاحية العدد',
                    'order'=>'1',
                ],
                [
                    'name' => 'فنون وثقافة',
                    'order'=>'2',
                ],
                [
                    'name' => 'تراث وابداع',
                    'order'=>'3',
                ],
                [
                    'name' => 'قرأت لك',
                    'order'=>'4',
                ],
                [
                    'name' => 'اخبار الاسبوع',
                    'order'=>'5',
                ],
                [
                    'name' => 'اعرف بلدك',
                    'order'=>'6',
                ],
                [
                    'name' => 'رموز',
                    'order'=>'7',
                ],
                [
                    'name' => 'ابداعات ادبية',
                    'order'=>'8',
                ],
                [
                    'name' => 'قصة اثر',
                    'order'=>'9',
                ],
                [
                    'name' => 'الصالون الثقافى',
                    'order'=>'10',
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
        Schema::dropIfExists('categories');
    }
}
