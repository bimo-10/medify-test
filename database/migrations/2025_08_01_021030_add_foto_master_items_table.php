<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_items', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('supplier');
        });

        // Optional: If you want to set a default value for existing records
        // DB::table('master_items')->update(['foto' => 'default.jpg']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_items', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
