<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kullanıcı',
            'sicilno' => '1',
            'password' => bcrypt('1'),
            'email' => '1@kayseriulasim.com',
            'active' => 'Aktif',
            'group' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Kullanıcı',
            'sicilno' => '2',
            'password' => bcrypt('2'),
            'email' => '2@kayseriulasim.com',
            'active' => 'Pasif',
            'group' => '2',
        ]);

        DB::table('admins')->insert([
            'name' => 'Admin',
            'sicilno' => '0',
            'password' => bcrypt('0'),
        ]);

        $user = App\User::find(2);

        DB::table('authority_groups')->insert([
            'title' => 'Mühendis',
        ]);

        DB::table('authority_groups')->insert([
            'title' => 'Müdür',
        ]);

        DB::table('authority_groups')->insert([
            'title' => 'Stajer',
        ]);

        $group = App\AuthorityGroup::find(1);
        $report = App\Report::find(1);
        $group -> prohibited_reports()->attach($report);

        $report = App\Report::find(2);
        $group -> prohibited_reports()->attach($report);
    }
}
