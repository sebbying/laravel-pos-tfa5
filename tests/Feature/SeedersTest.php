<?php

namespace Tests\Feature;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\RequiresPhpExtension;
use Tests\TestCase;

#[RequiresPhpExtension('pdo_sqlite')]
class SeedersTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeders_match_the_arrays_and_do_not_create_duplicates_when_run_again(): void
    {
        $this->seed();
        $this->seed();

        $this->assertDatabaseCount('customers', count(CustomerController::sampleRecords()));
        $this->assertDatabaseCount('users', count(UserController::sampleRecords()));

        foreach (CustomerController::sampleRecords() as $record) {
            unset($record['id']);
            $this->assertDatabaseHas('customers', $record);
        }

        foreach (UserController::sampleRecords() as $record) {
            unset($record['id']);
            $this->assertDatabaseHas('users', $record);
            $user = User::where('email', $record['email'])->firstOrFail();
            $this->assertTrue(Hash::check('Tfa5DemoOnly!2026', $user->password));
            $this->assertArrayNotHasKey('password', $user->toArray());
        }
    }
}
