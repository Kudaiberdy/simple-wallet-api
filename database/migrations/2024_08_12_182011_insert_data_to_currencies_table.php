<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('currencies')->insert($this->data());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('currencies')->whereIn('code', ['USD', 'RUB'])->delete();
    }

    private function data(): array
    {
        $dateTime = now();
        return [
            [
                'title' => 'Dollar',
                'code'  => 'USD',
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ],
            [
                'title' => 'Ruble',
                'code' => 'RUB',
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ],
        ];
    }
};
