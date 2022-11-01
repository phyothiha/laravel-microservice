<?php

namespace Meraki\Solution\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use Meraki\Solution\Domain\Models\Solution;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solution::factory()->count(50)->create();
    }
}
