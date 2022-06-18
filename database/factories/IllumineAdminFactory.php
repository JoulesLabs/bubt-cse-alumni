<?php

namespace Database\Factories;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JoulesLabs\IllumineAdmin\Models\IllumineAdmin;

class IllumineAdminFactory extends Factory
{
    protected $model ;

    public function __construct()
    {
        parent::__construct();
        $this->model = config('illumineadmin.users.model');
    }
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    // protected $model = IllumineAdmin::class;
   

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => 'admin@jouleslabs.com',
            'password' => 'secret',
            'remember_token' => Str::random(10),
            // 'type' => 1,
            // 'avatar' => null,
            // 'primary_location' => $this->faker->address,
            // 'status' => UserStatus::ACTIVE(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
