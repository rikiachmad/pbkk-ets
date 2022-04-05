<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookmark::factory()->
            count(40)->
            create();
    }
}
