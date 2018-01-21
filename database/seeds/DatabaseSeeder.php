<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReportSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(ReportContentSeeder::class);
    }
}
