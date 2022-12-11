<?php

namespace Database\Seeders;

use App\Http\Controllers\BookController;
use Database\Factories\BookFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fact = new BookFactory();
        $fact->count(1000)
            ->create()
            ;
    }

}
