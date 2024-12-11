<?php


namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        DB::table('orders')->insert([
            [
                'total_amount' => 500000,
                'status' => 'đã duyệt',
                'shipping_address' => 'Hanoi, Vietnam',
                'payment_method' => 'COD',
                'full_name' => 'Nguyen Van A', // Thêm giá trị cho full_name
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'total_amount' => 750000,
                'status' => 'đã duyệt',
                'shipping_address' => 'Hanoi, Vietnam',
                'payment_method' => 'COD',
                'full_name' => 'Nguyen Van B', // Thêm giá trị cho full_name
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'total_amount' => 600000,
                'status' => 'đã duyệt',
                'shipping_address' => 'Hanoi, Vietnam',
                'payment_method' => 'COD',
                'full_name' => 'Nguyen Van C', // Thêm giá trị cho full_name
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'total_amount' => 900000,
                'status' => 'đã duyệt',
                'shipping_address' => 'Hanoi, Vietnam',
                'payment_method' => 'COD',
                'full_name' => 'Nguyen Van D', // Thêm giá trị cho full_name
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'total_amount' => 1200000,
                'status' => 'chờ duyệt',
                'shipping_address' => 'Hanoi, Vietnam',
                'payment_method' => 'COD',
                'full_name' => 'Nguyen Van E', // Thêm giá trị cho full_name
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ]);
    }
}
