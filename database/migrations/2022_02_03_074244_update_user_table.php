<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('age')->after('email');
            $table->boolean('gender')->comment('1 = Male, 2 = Female')->after('age');
            $table->boolean('willing_to_work')->comment('1 = Yes, 2 = No')->after('gender');
            $table->string('languages')->after('willing_to_work');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('willing_to_work');
            $table->dropColumn('languages');
        });
    }
}
