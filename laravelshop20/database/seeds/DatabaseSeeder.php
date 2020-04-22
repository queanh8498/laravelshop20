<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //thứ tự chạy seeder
        $this->call(thanhtoanSeeder::class);
        $this->call(vanchuyenSeeder::class);
         $this->call(donvitinhSeeder::class);
         $this->call(chatlieuSeeder::class);
         $this->call(loaisanphamSeeder::class);
         $this->call(sanphamSeeder::class);
         //$this->call(hinhanhSeeder::class);
         $this->call(xuatxuSeeder::class);
         //$this->call(nhacungcapSeeder::class);
         $this->call(nguoidungSeeder::class);
         //$this->call(::class);
    }
}
