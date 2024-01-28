<?php

namespace Tests;

use App\Traits\Tests\WithOwner;
use App\Traits\Tests\WithUri;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use LazilyRefreshDatabase;
}
