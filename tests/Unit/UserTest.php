<?php

namespace Tests\Unit;
namespace App\Library\Classes\User;

use App\Library\Classes\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user()
    {
        $user = new User("Alan", "a@a.com", "asdf", "user");
        $this->assertTrue($user->getName() == "Alan" && $user->getEmail() == "a@a.com" &&
            $user->getPassword() == "asdf" && $user->getRole() == "user");
    }
}
