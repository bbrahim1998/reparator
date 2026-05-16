<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE pedidos MODIFY COLUMN has_to_comment VARCHAR(50) NOT NULL DEFAULT 'en otro momento'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pedidos MODIFY COLUMN has_to_comment ENUM('comentado','no quiere comentar','en otro momento') NOT NULL DEFAULT 'no quiere comentar'");
    }
};
