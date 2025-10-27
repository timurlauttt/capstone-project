<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // add a temporary varchar column to migrate values safely
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('status_temp')->nullable()->after('message');
        });

        // map existing values to new payment statuses (default to 'unpaid')
        DB::table('inquiries')->update([
            'status_temp' => DB::raw("CASE
                WHEN status IN ('paid','unpaid','partial') THEN status
                ELSE 'unpaid' END")
        ]);

        // drop old enum column and recreate with new enum values
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('inquiries', function (Blueprint $table) {
            $table->enum('status', ['paid','unpaid','partial'])->default('unpaid')->after('message');
        });

        // copy temp values into new enum column
        DB::table('inquiries')->update(['status' => DB::raw('status_temp')]);

        // drop temp column
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('status_temp');
        });
    }

    public function down()
    {
        // revert to previous enum values: new, read, closed
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('status_temp')->nullable()->after('message');
        });

        DB::table('inquiries')->update([
            'status_temp' => DB::raw("CASE
                WHEN status IN ('new','read','closed') THEN status
                ELSE 'new' END")
        ]);

        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('inquiries', function (Blueprint $table) {
            $table->enum('status', ['new','read','closed'])->default('new')->after('message');
        });

        DB::table('inquiries')->update(['status' => DB::raw('status_temp')]);

        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('status_temp');
        });
    }
};
