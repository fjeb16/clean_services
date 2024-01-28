<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Unico', 
                'slug' => 'unico', 
                'stripe_plans' => 'una_vez', 
                'price' => 1, 
                'description' => 'unico'
            ],
            [
                'name' => 'Profundo', 
                'slug' => 'profundo', 
                'stripe_plans' => 'profundo', 
                'price' => 1, 
                'description' => 'profundo'
            ]
            // [
            //     'name' => 'Pan Basico', 
            //     'slug' => 'business-plan', 
            //     'stripe_plan' => 'price_1ODum5KfuYCQVBMcIGGaPrpR', 
            //     'price' => 10, 
            //     'description' => 'Business Plan'
            // ],
            // [
            //     'name' => 'Plan Premium', 
            //     'slug' => 'premium', 
            //     'stripe_plan' => 'price_1ODulCKfuYCQVBMcbu3wZPpq', 
            //     'price' => 20, 
            //     'description' => 'Premium'
            // ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
