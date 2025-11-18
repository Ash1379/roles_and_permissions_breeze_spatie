<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ایجاد نقش Super Admin
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);

        // 2. ایجاد همه Permission ها برای نقش Super Admin
        // اگر Permission ها قبلاً ایجاد شده‌اند:
        $permissions = Permission::pluck('name')->toArray();

        // اختصاص تمام Permission ها به نقش
        $superAdminRole->syncPermissions($permissions);

        // 3. ایجاد یوزر Super Admin
        $user = User::firstOrCreate(
            ['email' => 'superadmin@ps.ps'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // 4. اختصاص نقش به یوزر
        $user->assignRole($superAdminRole);
    }
}
