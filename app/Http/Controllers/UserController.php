<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        // Account listing only; authentication is outside this activity.
        $users = self::sampleRecords();

        return view('users.index', compact('users'));
    }

    /**
     * Fictional sample records shared with the optional database seeder.
     *
     * @return array<int, array{id: int, name: string, email: string, role: string, status: string}>
     */
    public static function sampleRecords(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Alex Mendoza',
                'email' => 'alex.mendoza@sample.example',
                'role' => 'Administrator',
                'status' => 'Active',
            ],
            [
                'id' => 2,
                'name' => 'Patricia Lim',
                'email' => 'patricia.lim@sample.example',
                'role' => 'Manager',
                'status' => 'Active',
            ],
            [
                'id' => 3,
                'name' => 'Carlo Navarro',
                'email' => 'carlo.navarro@sample.example',
                'role' => 'Cashier',
                'status' => 'Active',
            ],
            [
                'id' => 4,
                'name' => 'Nicole Torres',
                'email' => 'nicole.torres@sample.example',
                'role' => 'Cashier',
                'status' => 'Inactive',
            ],
            [
                'id' => 5,
                'name' => 'Rafael Castillo',
                'email' => 'rafael.castillo@sample.example',
                'role' => 'Inventory Staff',
                'status' => 'Active',
            ],
        ];
    }
}
