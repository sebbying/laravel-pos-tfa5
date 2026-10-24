<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        // TFA5 uses an in-memory array, so this page needs no database.
        $customers = self::sampleRecords();

        return view('customers.index', compact('customers'));
    }

    /**
     * Fictional sample records shared with the optional database seeder.
     *
     * @return array<int, array{id: int, name: string, email: string, phone: string, city: string, status: string}>
     */
    public static function sampleRecords(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Marco Reyes',
                'email' => 'marco.reyes@sample.example',
                'phone' => '0900 000 0001',
                'city' => 'Muntinlupa',
                'status' => 'Active',
            ],
            [
                'id' => 2,
                'name' => 'Sofia Cruz',
                'email' => 'sofia.cruz@sample.example',
                'phone' => '0900 000 0002',
                'city' => 'Las Piñas',
                'status' => 'Active',
            ],
            [
                'id' => 3,
                'name' => 'Daniel Santos',
                'email' => 'daniel.santos@sample.example',
                'phone' => '0900 000 0003',
                'city' => 'Parañaque',
                'status' => 'Inactive',
            ],
            [
                'id' => 4,
                'name' => 'Isabel Garcia',
                'email' => 'isabel.garcia@sample.example',
                'phone' => '0900 000 0004',
                'city' => 'Bacoor',
                'status' => 'Active',
            ],
            [
                'id' => 5,
                'name' => 'Miguel Flores',
                'email' => 'miguel.flores@sample.example',
                'phone' => '0900 000 0005',
                'city' => 'San Pedro',
                'status' => 'Active',
            ],
            [
                'id' => 6,
                'name' => 'Camille Ramos',
                'email' => 'camille.ramos@sample.example',
                'phone' => '0900 000 0006',
                'city' => 'Biñan',
                'status' => 'Inactive',
            ],
        ];
    }
}
