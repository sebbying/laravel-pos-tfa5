<?php

namespace Database\Seeders;

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        foreach (CustomerController::sampleRecords() as $record) {
            // Let the database assign its own key to avoid ID conflicts.
            unset($record['id']);

            Customer::updateOrCreate(['email' => $record['email']], $record);
        }
    }
}
