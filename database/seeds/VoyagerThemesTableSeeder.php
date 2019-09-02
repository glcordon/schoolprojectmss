<?php

use Illuminate\Database\Seeder;

class VoyagerThemesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('voyager_themes')->delete();

        \DB::table('voyager_themes')->insert(array (
            0 =>
            array (
                'id' => 2,
                'name' => 'UI Kit Theme',
                'folder' => 'uikit',
                'active' => 1,
                'version' => '1.0',
                'created_at' => '2017-11-21 17:09:21',
                'updated_at' => '2017-11-21 17:11:57',
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Bootstrap Theme',
                'folder' => 'bootstrap',
                'active' => 0,
                'version' => '1.0',
                'created_at' => '2017-11-21 17:09:21',
                'updated_at' => '2017-11-21 17:11:57',
            ),
        ));


    }
}