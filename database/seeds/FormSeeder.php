<?php

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('form_params')->insert([
            'label' => 'Başlangıç Tarihi',
            'type' => 'date',
            'name' => 'sdate'
        ]);

        DB::table('form_params')->insert([
            'label' => 'Bitiş Tarihi',
            'type' => 'date',
            'name' => 'fdate'
        ]);

        DB::table('form_params')->insert([
            'label' => 'Kart ID',
            'type' => 'text',
            'name' => 'kartid'
        ]);

        $report = App\Report::find(3);

        $report->params()->attach(1);
        $report->params()->attach(2);
        $report->params()->attach(3);

        $menu = App\Menu::find(1);


    }
}
