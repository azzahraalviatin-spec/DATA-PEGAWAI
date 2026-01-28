<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('pegawais', function (Blueprint $table) {
        $table->string('jenis_kelamin')->after('jabatan_id');
        $table->string('no_telp')->after('jenis_kelamin');
        $table->text('alamat')->after('no_telp');
    });
}


    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }
};
