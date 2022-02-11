<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(User::class);

            $table->string('issuer_company');
            $table->string('issuer_full_name');
            $table->string('issuer_website');
            $table->string('issuer_address');
            $table->string('issuer_city');
            $table->unsignedInteger('issuer_zip');
            $table->string('issuer_country');
            $table->string('issuer_phone');
            $table->string('issuer_email');
            // $table->string('logo'); // TODO

            $table->string('client_company');
            $table->string('client_full_name');
            $table->string('client_address');
            $table->string('client_city');
            $table->unsignedInteger('client_zip');
            $table->string('client_country');

            $table->float('subtotal');
            $table->float('tax');
            $table->float('discount');
            $table->float('total');

            $table->longText('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
