<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use JoulesLabs\IllumineAdmin\Models\IllumineAdmin;

class IllumineAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        config('illumineadmin.users.model')::truncate();
        

        // $emails = [
        //     'shamir.imtiaz@jouleslabs.com',
        //     'ashraful@jouleslabs.com',
        //     'zahid@jouleslabs.com'
        // ];


        
        config('illumineadmin.users.model')::factory()
                ->create();
       
        // foreach ($emails as $email) {
        //     IllumineAdmin::factory()
        //         ->create([
        //             'email' => $email
        //         ]);
        // }
    }
}
