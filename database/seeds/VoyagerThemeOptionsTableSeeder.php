<?php

use Illuminate\Database\Seeder;

class VoyagerThemeOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('voyager_theme_options')->delete();

        \DB::table('voyager_theme_options')->insert(array (
            0 =>
            array (
                'id' => 2,
                'voyager_theme_id' => 2,
                'key' => 'logo',
                'value' => 'themes/February2018/UUgOwPG08CnLLBOtgNWR.png',
                'created_at' => '2017-11-22 16:54:46',
                'updated_at' => '2018-02-11 05:02:40',
            ),
            1 =>
            array (
                'id' => 4,
                'voyager_theme_id' => 2,
                'key' => 'home_headline',
                'value' => 'Create your next great idea',
                'created_at' => '2017-11-25 17:31:45',
                'updated_at' => '2018-08-28 00:17:41',
            ),
            2 =>
            array (
                'id' => 5,
                'voyager_theme_id' => 2,
                'key' => 'home_subheadline',
                'value' => 'Wave is the perfect starter kit for building your next great idea',
                'created_at' => '2017-11-25 17:31:45',
                'updated_at' => '2017-11-26 07:11:47',
            ),
            3 =>
            array (
                'id' => 6,
                'voyager_theme_id' => 2,
                'key' => 'home_description',
                'value' => 'Built using Laravel Voyager,  Wave will help you rapidly build your Software as a Service application. Out of the box Authentication, Subscriptions, Invoices, Announcements, User Profiles, API, and so much more!',
                'created_at' => '2017-11-25 17:31:45',
                'updated_at' => '2017-11-26 07:09:50',
            ),
            4 =>
            array (
                'id' => 7,
                'voyager_theme_id' => 2,
                'key' => 'home_cta',
                'value' => 'Get It Now',
                'created_at' => '2017-11-25 20:02:29',
                'updated_at' => '2017-11-26 16:12:28',
            ),
            5 =>
            array (
                'id' => 8,
                'voyager_theme_id' => 2,
                'key' => 'home_cta_url',
                'value' => '/register',
                'created_at' => '2017-11-25 20:09:33',
                'updated_at' => '2017-11-26 16:12:41',
            ),
            6 =>
            array (
                'id' => 9,
                'voyager_theme_id' => 2,
                'key' => 'home_promo_image',
                'value' => 'themes/February2018/mFajn4fwpGFXzI1UsNH6.png',
                'created_at' => '2017-11-25 21:36:46',
                'updated_at' => '2017-11-29 01:17:00',
            ),
            7 =>
            array (
                'id' => 10,
                'voyager_theme_id' => 2,
                'key' => 'footer_logo',
                'value' => 'themes/August2018/TksmVWMqp5JXUQj8C6Ct.png',
                'created_at' => '2018-08-28 23:12:11',
                'updated_at' => '2018-08-28 23:12:11',
            ),
            8 =>
            array (
                'id' => 11,
                'voyager_theme_id' => 3,
                'key' => 'logo',
                'value' => 'themes/February2018/UUgOwPG08CnLLBOtgNWR.png',
                'created_at' => '2017-11-22 16:54:46',
                'updated_at' => '2018-02-11 05:02:40',
            ),
            9 =>
            array (
                'id' => 12,
                'voyager_theme_id' => 3,
                'key' => 'home_headline',
                'value' => 'Create your next great idea',
                'created_at' => '2017-11-25 17:31:45',
                'updated_at' => '2018-08-28 00:17:41',
            ),
            10 =>
            array (
                'id' => 13,
                'voyager_theme_id' => 3,
                'key' => 'home_subheadline',
                'value' => 'Wave is the perfect starter kit for building your next great idea',
                'created_at' => '2017-11-25 17:31:45',
                'updated_at' => '2017-11-26 07:11:47',
            ),
            11 =>
            array (
                'id' => 14,
                'voyager_theme_id' => 3,
                'key' => 'home_description',
                'value' => 'Built using Laravel Voyager,  Wave will help you rapidly build your Software as a Service application. Out of the box Authentication, Subscriptions, Invoices, Announcements, User Profiles, API, and so much more!',
                'created_at' => '2017-11-25 17:31:45',
                'updated_at' => '2017-11-26 07:09:50',
            ),
            12 =>
            array (
                'id' => 15,
                'voyager_theme_id' => 3,
                'key' => 'home_cta',
                'value' => 'Get It Now',
                'created_at' => '2017-11-25 20:02:29',
                'updated_at' => '2017-11-26 16:12:28',
            ),
            13 =>
            array (
                'id' => 16,
                'voyager_theme_id' => 3,
                'key' => 'home_cta_url',
                'value' => '/register',
                'created_at' => '2017-11-25 20:09:33',
                'updated_at' => '2017-11-26 16:12:41',
            ),
            14 =>
            array (
                'id' => 17,
                'voyager_theme_id' => 3,
                'key' => 'home_promo_image',
                'value' => 'themes/February2018/mFajn4fwpGFXzI1UsNH6.png',
                'created_at' => '2017-11-25 21:36:46',
                'updated_at' => '2017-11-29 01:17:00',
            ),
            15 =>
            array (
                'id' => 18,
                'voyager_theme_id' => 3,
                'key' => 'footer_logo',
                'value' => 'themes/August2018/TksmVWMqp5JXUQj8C6Ct.png',
                'created_at' => '2018-08-28 23:12:11',
                'updated_at' => '2018-08-28 23:12:11',
            )
        ));


    }
}