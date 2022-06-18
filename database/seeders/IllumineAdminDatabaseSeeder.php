<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IllumineAdminDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            IllumineAdminSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
