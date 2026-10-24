<?php

namespace Database\Seeders;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Placeholder for optional database records; this app has no login.
        $password = Hash::make('Tfa5DemoOnly!2026');

        foreach (UserController::sampleRecords() as $record) {
            unset($record['id']);

            User::updateOrCreate(
                ['email' => $record['email']],
                [...$record, 'password' => $password],
            );
        }
    }
}
