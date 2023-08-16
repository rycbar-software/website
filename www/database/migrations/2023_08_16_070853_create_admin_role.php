<?php

use App\Enum\RoleEnum;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Role::create(['name' => RoleEnum::ADMIN->value]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $id = Role::findByName(RoleEnum::ADMIN->value)->id;
        if ($id) {
            Role::destroy($id);
        }
    }
};
