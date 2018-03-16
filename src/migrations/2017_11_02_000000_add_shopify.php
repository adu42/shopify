<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCarterColumnsToUsers extends Migration
{
    public function up()
    {
        Schema::table('shopify', function (Blueprint $table) {
            $table->unsignedInteger('shopify_id')->nullable();
            $table->string('shopify_email')->nullable();
            $table->string('shopify_domain')->nullable();
            $table->string('plan')->nullable();
            $table->unsignedInteger('shopify_charge_id')->nullable();
            $table->string('shopify_token')->nullable();
            $table->string('shopify_scope')->nullable();
            $table->unsignedInteger('user_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('shopify', function (Blueprint $table) {
            $table->dropColumn(
                'shopify_id',
                'shopify_domain',
                'shopify_charge_id',
                'shopify_token',
                'shopify_scope'
            );
        });
    }
}
