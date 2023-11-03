<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('task')->insert([
            ['taskName' => "clean phone",'taskDescription' => "clen ur phoon ", 'list' => 1],
            ['taskName' => "work on this project ",'taskDescription' => "work on this project  ", 'list' => 2]
        ]);
    }
}
