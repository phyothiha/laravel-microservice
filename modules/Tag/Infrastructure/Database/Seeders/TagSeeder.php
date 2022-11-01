<?php

namespace Meraki\Tag\Infrastructure\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Meraki\Tag\Domain\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 50) as $i) {
            if ($i <= 10) {
                Tag::create([
                    'name' => "tag{$i}"
                ]);
            } else {
                Tag::create([
                    'name' => $faker->text(10)
                ]);
            }
        }
    }
}
