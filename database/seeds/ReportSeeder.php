<?php

use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'menuid' => '1',
            'title' => 'TV No ile Yapılan Yüklemeler',
            'dbquery' => 'SELECT * FROM TABLE',
        ]);

        DB::table('reports')->insert([
            'menuid' => '1',
            'title' => 'Kartın Son İşlemleri',
            'dbquery' => 'select * from kartin_son_islemleri where kart_id = :kartid',
        ]);

        DB::table('reports')->insert([
            'menuid' => '1',
            'title' => 'Kart Kullanım Raporu',
            'dbquery' => 'SELECT * FROM TABLE',
        ]);

        DB::table('reports')->insert([
            'menuid' => '2',
            'title' => 'Denetim Raporu',
            'dbquery' => 'SELECT * FROM TABLE',
        ]);

        DB::table('reports')->insert([
            'menuid' => '3',
            'title' => 'Hakediş Raporu',
            'dbquery' => 'SELECT * FROM TABLE',
        ]);

        DB::table('menus')->insert([
            'title' => 'Sayısal Raporlar',
        ]);

        DB::table('menus')->insert([
            'title' => 'Denetim Raporları',
        ]);

        DB::table('menus')->insert([
            'title' => 'Hakediş Raporları',
        ]);
    }
}
