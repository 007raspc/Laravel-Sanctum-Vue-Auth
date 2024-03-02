<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')
                ->after('email')
                ->default(3);
            $table->string('avatar')
                ->after('role_id')
                ->nullable();
            $table->softDeletes();

            $table->index('role_id', 'role_idx');
            $table->foreign('role_id', 'role_id_fk')
                ->references('id')
                ->on('roles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('role_id_fk');
            $table->dropColumn('role_id');
            $table->dropSoftDeletes();
        });
    }
};
