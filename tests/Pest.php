<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(
    Tests\TestCase::class,
)->in('Feature');

uses(
    Tests\Feature\Admin\AdminTest::class,
)->in('Feature/Admin');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function login(\Illuminate\Contracts\Auth\Authenticatable $authenticatable, string $guard = null)
{
    test()->setOwner($authenticatable);

    return test()->actingAs(test()->owner(), $guard);
}

function admin(array $data = [])
{
    return login(admin_account($data), 'admin');
}

function user(array $data = [])
{
    return login(user_account($data), 'user');
}

function admin_account(array $data = [])
{
    return \App\Models\Admin::factory()->create($data);
}

function user_account(array $data = [])
{
    return \App\Models\User::factory()->create($data);
}
