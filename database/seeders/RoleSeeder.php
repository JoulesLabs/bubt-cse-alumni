<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Nahid\Permit\Roles\UserRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        UserRole::truncate();

        $role = Role::factory()
            // ->connection(config("permit.connection"))
            ->create();

        foreach (config('illumineadmin.users.model')::all() as $user){
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
