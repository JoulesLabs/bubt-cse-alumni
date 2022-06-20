<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Information;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Nahid\Permit\Roles\UserRole;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();

        Company::query()->create([
            'name' => 'JoulesLabs',
            'website' => 'https://jouleslabs.com',
        ]);


    }
}
