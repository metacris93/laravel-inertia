<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() === 'production') exit();
        // Truncate all tables, except migrations

        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        Schema::disableForeignKeyConstraints();
        foreach ($tables as $table) {
            if ($table !== 'migrations')
                DB::table($table)->truncate();
        }
        Schema::enableForeignKeyConstraints();
        $this->init();
    }
    public function init()
    {
        User::factory()->create([
            'email' => 'i@admin.com',
            'password' => bcrypt('123456')
        ]);
        Note::factory(30)->create();
    }
}
