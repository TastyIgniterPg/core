<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (DB::getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE mail_templates ALTER COLUMN layout_id TYPE bigint USING layout_id::bigint, ALTER COLUMN layout_id DROP NOT NULL');
        } else {
            Schema::table('mail_templates', function(Blueprint $table) {
                $table->unsignedBigInteger('layout_id')->nullable()->change();
            });
        }
    }

    public function down()
    {
        //
    }
};
