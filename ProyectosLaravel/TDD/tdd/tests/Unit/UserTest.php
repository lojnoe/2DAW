<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_age(): void
    {
        $user = new User;
        $user->age =11;
        $this->assertEquals('Menor de edad',$user->age);
    }
}
