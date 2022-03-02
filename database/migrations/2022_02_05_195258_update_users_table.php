<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name');
            $table->string('address');
            $table->string('country');
            $table->string('phone');
            $table->smallInteger('status_id')->index();
            $table->integer('city_id')->index();
            $table->integer('contact_count')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('address');
            $table->dropColumn('country');
            $table->dropColumn('phone');
            $table->dropColumn('status_id');
            $table->dropColumn('city_id');
            $table->dropColumn('contact_count');
        });
    }
}
