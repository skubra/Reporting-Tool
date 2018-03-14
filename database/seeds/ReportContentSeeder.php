<?php

use Illuminate\Database\Seeder;

class ReportContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kartin_son_islemleri')->insert([
            'kart_id' => '1',
            'islem' => 'İşlem 1',
            'faker' => '13',
        ]);

        DB::table('kartin_son_islemleri')->insert([
            'kart_id' => '1',
            'islem' => 'İşlem 2',
            'faker' => '9',
        ]);

        DB::table('kartin_son_islemleri')->insert([
            'kart_id' => '1',
            'islem' => 'İşlem 3',
            'faker' => '17',
        ]);

    }
}
