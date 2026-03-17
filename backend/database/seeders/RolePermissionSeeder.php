<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
          $user = User::where('email', 'admin@example.com');
        // Create permissions safely
        $user->update(['role' => 'admin']);
        Permission::firstOrCreate(['name' => 'create post']);
        Permission::firstOrCreate(['name' => 'edit post']);

        // Create roles safely
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Give permission to admin
        $admin->givePermissionTo('create post');

        // Find first user
        $user = User::where('email', 'admin@example.com')->first();
         
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
