<?php

namespace Database\Seeders;

use App\Models\Textbook;
use Illuminate\Database\Seeder;

class TextbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Textbook::factory()
            ->count(20)
            ->create();
    }
}
