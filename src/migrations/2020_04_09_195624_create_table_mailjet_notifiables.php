<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMailjetNotifiables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('mailjet_notifiables');

        Schema::create('mailjet_notifiables', function (Blueprint $table) {
            $table->bigIncrements();
            $table->string('mailjet_request_id', 36);
            $table->morphs('mailjet_notifiable');
            $table->timestamps();
        });

        Schema::table('mailjet_notifiables', function(Blueprint $table) {
            $table->index('mailjet_request_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('mailjet_notifiables');
    }
}
