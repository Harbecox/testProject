<?php

namespace Database\Seeders;

use App\Models\Affiliate;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Affiliate::factory(5)->create()->each(function ($affiliate){
            $employees = Employee::factory(rand(10,20))->create();
            $affiliate->employees()->attach($employees);
        });
    }
}
