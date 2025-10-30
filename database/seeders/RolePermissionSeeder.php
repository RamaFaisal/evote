<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions untuk sistem evote
        $permissions = [
            // Global permissions (untuk Super Admin, DPN, DPP)
            'manage-users',
            'manage-global-settings',
            'view-all-evotes',
            'create-evote',
            'delete-evote',
            'manage-global-roles',
            
            // Evote-specific permissions (untuk Panitia, Voter, Bakal Calon)
            'view-evote',
            'edit-evote',
            'manage-evote-schedule',
            'manage-evote-candidates',
            'manage-evote-voters',
            'view-evote-results',
            'vote-in-evote',
            'register-as-candidate',
            'edit-candidate-profile',
            'view-campaign-materials',
            'upload-campaign-materials',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create global roles (tidak terikat evote tertentu)
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $dpnRole = Role::firstOrCreate(['name' => 'DPN']);
        $dppRole = Role::firstOrCreate(['name' => 'DPP']);

        // Create evote-specific roles (akan terikat dengan evote tertentu via team feature)
        $panitiaRole = Role::firstOrCreate(['name' => 'Panitia']);
        $voterRole = Role::firstOrCreate(['name' => 'Voter']);
        $bakalCalonRole = Role::firstOrCreate(['name' => 'Bakal Calon']);

        // Assign permissions to global roles
        $superAdminRole->givePermissionTo(Permission::all());
        
        $dpnRole->givePermissionTo([
            'view-all-evotes',
            'create-evote',
            'manage-global-settings',
            'view-evote-results',
        ]);

        $dppRole->givePermissionTo([
            'view-all-evotes',
            'create-evote',
            'view-evote-results',
        ]);

        // Permissions untuk evote-specific roles akan di-assign per evote
        // Ini hanya template permission yang bisa di-assign
        $panitiaRole->givePermissionTo([
            'view-evote',
            'edit-evote',
            'manage-evote-schedule',
            'manage-evote-candidates',
            'manage-evote-voters',
            'view-evote-results',
        ]);

        $voterRole->givePermissionTo([
            'view-evote',
            'vote-in-evote',
            'view-campaign-materials',
        ]);

        $bakalCalonRole->givePermissionTo([
            'view-evote',
            'register-as-candidate',
            'edit-candidate-profile',
            'upload-campaign-materials',
            'view-campaign-materials',
        ]);
    }
}
