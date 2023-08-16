<?php

namespace App\Console\Commands;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create website administrator user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', config('app.admin_email'))->first();
        if ($user) {
            $this->error('User with email ' . config('app.admin_email') . ' already exists!');
            if ($this->confirm('Do you wish to remove them and create new?')) {
                $user->delete();
            } else {
                return;
            }
        }

        $password = Str::password(8, true, true, false);
        $user = new User([
            'name' => 'Andriy Kryvenko',
            'email' => config('app.admin_email'),
            'password' => Hash::make($password)
        ]);
        $user->save();
        $user->assignRole(RoleEnum::ADMIN->value);
        $this->info('Admin was created successful! Please copy admin password');
        $this->info($password);
    }
}
