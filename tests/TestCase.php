<?php

namespace Tests;

use App\Traits\UserFactoryTrait;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, UserFactoryTrait;
}
