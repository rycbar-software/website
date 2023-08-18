<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    private const PERMISSIONS = [
        'create article',
        'edit article',
        'delete article',
        'create partner',
        'edit partner',
        'delete partner',
        'create product',
        'edit product',
        'delete product',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        foreach (self::PERMISSIONS as $name) {
            $permission = Permission::create(['name' => $name]);
            $adminRole->givePermissionTo($permission);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $permissions = Permission::whereIn('name', self::PERMISSIONS)->get();
        foreach ($permissions as $permission) {
            $adminRole->revokePermissionTo($permission);
            $permission->delete();
        }
    }
};
