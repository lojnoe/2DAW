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

    public function test_name_lowercase(): void
    {
        $user = new User;
        $user->name ='Manuel';
        $this->assertEquals('manuel',$user->name);
    }
    public function test_lastname_lowercase(): void
    {
        $user = new User;
        $user->lastname ='Garcia';
        $this->assertEquals('garcia',$user->lastname);
    }
    public function test_fullname_uppercase(): void
    {
        $user = new User;
        $user->name ='Manuel';
        $user->lastname ='Garcia';
        $this->assertEquals('MANUEL GARCIA',$user->fullname);
    }
}

