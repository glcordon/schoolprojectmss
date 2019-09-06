<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plans')->delete();
        
        \DB::table('plans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Basic',
                'description' => 'Signup for the Basic User Plan',
                'features' => 'Basic Feature Example 1, Basic Feature Example 2, Basic Feature Example 3, Basic Feature Example 4',
                'plan_id' => 'basic',
                'role_id' => 3,
                'default' => 0,
                'price' => '$5/month',
                'trial_days' => 0,
                'created_at' => '2018-07-03 05:03:56',
                'updated_at' => '2018-07-03 17:17:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Premium',
                'description' => 'Signup for our premium plan to access all our Premium Features.',
                'features' => 'Premium Feature Example 1, Premium Feature Example 2, Premium Feature Example 3, Premium Feature Example 4',
                'plan_id' => 'premium',
                'role_id' => 5,
                'default' => 1,
                'price' => '$8/month Paid Annually',
                'trial_days' => 0,
                'created_at' => '2018-07-03 16:29:46',
                'updated_at' => '2018-07-03 17:17:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Standard',
                'description' => 'Gain access to our standard features with the standard plan.',
                'features' => 'Standard Feature Example 1, Standard Feature Example 2, Standard Feature Example 3, Standard Feature Example 4',
                'plan_id' => 'standard',
                'role_id' => 4,
                'default' => 0,
                'price' => '$12/month',
                'trial_days' => 14,
                'created_at' => '2018-07-03 16:30:43',
                'updated_at' => '2018-08-22 22:26:19',
            ),
        ));
        
        
    }
}