<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nahid\Permit\Roles\Role;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_name' => 'Admin',
            'permission' => [
                'user' => ['create' => true, 'update' => true, 'list' => true, 'view' => true],
                'role' => ['create' => true, 'update' => true, 'list' => true, 'view' => true],
            ]
        ];
    }
}
