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
    App\Traits\Tests\WithOwner::class,
    App\Traits\Tests\WithUri::class,
)->in('Feature');

uses(
    Tests\Feature\Admin\AdminTest::class,
)->in('Feature/Admin');

uses(
    Tests\Feature\User\UserTest::class,
)->in('Feature/User');

uses(
    Tests\Feature\Product\ProductTest::class,
)->in('Feature/Product');

uses(
    Tests\Feature\UserProduct\UserProductTest::class,
)->in('Feature/UserProduct');

// current tests
uses()->group('cur')->in('Feature/UserProduct');

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
