<?php

namespace User\database\seeders;

use User\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

/**
 * Class AuthTableSeeder.
 */
class AuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        fwrite(STDOUT, "seeding starting \n");
        foreach (USER_ROLES as $role) {
            Role::query()->firstOrCreate(['name' => $role]);
        }
        if (User::query()->count() > 0)
            return;
        if (!User::query()->where('email', 'admin@yopmail.com')->exists()) {
            $admin = User::whereUsername('admin')->first();
            if (!$admin) {
                $admin = User::factory()->create([
                    'username' => 'admin',
                ]);
                $admin->password = 'PA$$W0RD';
                $admin->member_id = 1000;
                $admin->first_name = 'Doctor';
                $admin->last_name = 'Johny';
                $admin->email_verified_at = now();
            }

            $admin->email = 'admin@yopmail.com';
            $admin->save();

            $admin->assignRole([USER_ROLE_SUPER_ADMIN,USER_ROLE_CLIENT]);
        }


    }
}
