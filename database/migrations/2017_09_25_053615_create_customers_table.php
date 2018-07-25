<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('contact');
            $table->timestamp('date_register');
            $table->integer('admin_id')->nullable()->unsigned();
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->enum('status', ['active', 'banned', 'inactive']);
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('customers', function(Blueprint $table)
        {
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
