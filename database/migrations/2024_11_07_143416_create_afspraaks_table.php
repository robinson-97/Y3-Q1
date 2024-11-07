<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfspraaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afspraaks', function (Blueprint $table) {
            $table->id(); // Auto-increment primaire sleutel
            $table->unsignedBigInteger('user_id'); // Verwijzing naar de user
            $table->string('email'); // Email van de gebruiker
            $table->string('product', 50); // Het product waarvoor de afspraak is
            $table->string('help_request', 200); // Het verzoek voor hulp
            $table->string('phone', 20); // Verhoogd de lengte van het telefoonnummer naar 20 tekens
            $table->dateTime('datum'); // Datum en tijd van de afspraak
            $table->text('opmerkingen')->nullable(); // Optionele opmerkingen
            $table->timestamps(); // Timestamps voor created_at en updated_at

            // Foreign key constraint naar de users tabel
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afspraaks');
    }
}
