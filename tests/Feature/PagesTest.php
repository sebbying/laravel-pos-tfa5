<?php

namespace Tests\Feature;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public static function pages(): array
    {
        return [
            'landing' => ['/', 'Home'],
            'about' => ['/about', 'About'],
            'customers' => ['/customers', 'Customer Accounts'],
            'users' => ['/users', 'User Accounts'],
        ];
    }

    #[DataProvider('pages')]
    public function test_pages_work_without_a_database_and_link_to_each_other(string $uri, string $title): void
    {
        // If a page starts querying a database, this invalid connection exposes it.
        config(['database.default' => 'not-configured-for-page-tests']);

        $response = $this->get($uri)->assertOk()->assertSee($title);

        foreach (['home', 'about', 'customers.index', 'users.index'] as $name) {
            $response->assertSee('href="'.route($name).'"', false);
        }

        $response->assertSee('aria-current="page"', false)
            ->assertDontSee('@foreach', false)
            ->assertDontSee('@yield', false);
    }

    public function test_customer_directory_displays_every_sample_record(): void
    {
        $records = CustomerController::sampleRecords();
        $this->assertGreaterThanOrEqual(5, count($records));
        $this->assertCount(count($records), array_unique(array_column($records, 'id')));
        $response = $this->get('/customers')->assertOk();

        foreach ($records as $customer) {
            foreach (['name', 'email', 'phone', 'city', 'status'] as $field) {
                $response->assertSee($customer[$field]);
            }
        }

        $this->assertSame(count($records), substr_count($response->getContent(), '<tr>') - 1);
    }

    public function test_user_directory_displays_every_record_without_passwords(): void
    {
        $records = UserController::sampleRecords();
        $this->assertGreaterThanOrEqual(5, count($records));
        $this->assertCount(count($records), array_unique(array_column($records, 'id')));
        $response = $this->get('/users')->assertOk();

        foreach ($records as $user) {
            foreach (['name', 'email', 'role', 'status'] as $field) {
                $response->assertSee($user[$field]);
            }
        }

        $response->assertDontSee('Tfa5DemoOnly!2026')
            ->assertDontSee('type="password"', false);
        $this->assertSame(count($records), substr_count($response->getContent(), '<tr>') - 1);
    }

    public function test_unknown_page_returns_not_found(): void
    {
        $this->get('/this-page-does-not-exist')->assertNotFound();
    }
}
