<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Nahid\Permit\Roles\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Information::truncate();

        $user = User::query()->create([
            'name' => 'Mehedi Hasan Nahid',
            'email' => 'nahid.dns@gmail.com',
            'password' => bcrypt('secret'),
            'mobile' => '01711122233',
            'status' => 1,
            'verified_at' => Carbon::now(),
        ]);

        if ($user) {
            Information::query()->create([
                'user_id' => $user->id,
                'company_id' => 1,
                'intake' => 6,
                'shift' => 2,
                'lives' => 'Mirpur, Dhaka',
                'designation' => 'Chief Technical Officer',
            ]);
        }
    }
}
