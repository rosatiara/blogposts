<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name'=> 'list Blog Posts']);
        Permission::create(['name'=> 'create Blog Posts']);
        Permission::create(['name'=> 'store Blog Posts']);
        Permission::create(['name'=> 'show Blog Posts']);
        Permission::create(['name'=> 'edit Blog Posts']);
        Permission::create(['name'=> 'update Blog Posts']);
        Permission::create(['name'=> 'delete Blog Posts']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Writer']);
        $role1->givePermissionTo('list Blog posts');
        $role1->givePermissionTo('create Blog posts');
        $role1->givePermissionTo('store Blog posts');
        $role1->givePermissionTo('show Blog posts');

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('list Blog posts');
        $role2->givePermissionTo('create Blog posts');
        $role2->givePermissionTo('store Blog posts');
        $role2->givePermissionTo('show Blog posts');
        $role2->givePermissionTo('edit Blog posts');
        $role2->givePermissionTo('update Blog posts');

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $role3 = Role::create(['name' => 'Super-Admin']);

        // create demo users
        $user = User::factory()->create([
            'name' => 'Writer User',
            'email' => 'writer@gmail.com',
        ]);
        $user->save();
        $user->assignRole($role1);

        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
        ]);
        $user->save();
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@gmail.com',
        ]);
        $user->save();
        $user->assignRole($role3);


    }
}
