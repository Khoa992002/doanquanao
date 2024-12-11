<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            ['size' => 'XS', 'description' => 'Extra Small'],
            ['size' => 'S', 'description' => 'Small'],
            ['size' => 'M', 'description' => 'Medium'],
            ['size' => 'L', 'description' => 'Large'],
            ['size' => 'XL', 'description' => 'Extra Large'],
            ['size' => 'XXL', 'description' => 'Double Extra Large'],
            // Thêm các size khác nếu cần
        ]);
    }
}
