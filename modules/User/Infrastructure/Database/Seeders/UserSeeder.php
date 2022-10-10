<?php

namespace Meraki\User\Infrastructure\Database\Seeders;

use Illuminate\Database\Seeder;
use Meraki\User\Domain\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = User::factory()
            ->count(30)
            ->sequence(fn ($sequence) => [
                'username' => 'customer-' . $sequence->index + 1,
                'first_name' => 'Customer',
                'last_name' => $sequence->index + 1,
                'email' => 'customer' . $sequence->index + 1 . '@mail.com',
                'time_zone' => 'Asia/Yangon',
            ])
            ->create();

        $customers->each(function ($customer) {
            $customer->assignRole('customer');
        });

        $agents = User::factory()
            ->count(10)
            ->sequence(fn ($sequence) => [
                'username' => 'agent-' . $sequence->index + 1,
                'first_name' => 'Agent',
                'last_name' => $sequence->index + 1,
                'email' => 'agent' . $sequence->index + 1 . '@mail.com',
                'time_zone' => 'Asia/Singapore',
            ])
            ->create();

        $agents->each(function ($agent) {
            $agent->assignRole('agent');
        });

        $admin = User::factory()->create([
            'username' => 'admin1',
            'first_name' => 'admin',
            'last_name' => '1',
            'email' => 'admin1@mail.com',
            'time_zone' => 'Asia/Bangkok',
        ]);

        $admin->assignRole('admin');
    }
}
