<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfumeSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfume_sizes')->insert([
            [
                "size" => "3ml(roller)"
            ],
            [
                "size" => "10ml(spray)"
            ],
            [
                "size" => "10ml(roller)"
            ],
            [
                "size" => "30ml(spray)"
            ],
            ]);
    }
}
