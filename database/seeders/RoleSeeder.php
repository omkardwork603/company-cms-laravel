<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'Full access to the CMS.',
            ],

            [
                'name' => 'Editor',
                'description' => 'Can manage website content.',
            ],

            [
                'name' => 'Staff',
                'description' => 'Limited CMS access.',
            ],
        ];


        foreach ($roles as $role) {

            Role::updateOrCreate(
                [
                    'slug' => Str::slug(
                        $role['name']
                    ),
                ],
                [
                    'name' => $role['name'],

                    'description' =>
                        $role['description'],

                    'status' => true,
                ]
            );
        }
    }
}