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
        //$this->call(UsersTableSeeder::class);
        factory(App\Model\Product::class,10)->create();
        factory(App\Model\Buyer::class,10)->create();
        factory(App\Model\Auction::class,10)->create();
    }
}
