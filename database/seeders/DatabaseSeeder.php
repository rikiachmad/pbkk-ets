<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Riki Achmad',
            'username' => 'rikiachmd',
            'roles' => 'admin',
            'email' => 'rikiachmad@ymail.com',
            'password' => bcrypt('123123123'),
        ]);

        User::factory()
            ->count(10)
            ->create();

        $this->call([
            MagazineSeeder::class,
            PaperSeeder::class,
            TextbookSeeder::class,
            InquirySeeder::class,
            BookmarkSeeder::class,
        ]);
    }
}
