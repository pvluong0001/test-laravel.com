<?php

namespace Tests\Unit\Model;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function canCreateUser() {
        $data = [
            'name' => "luong",
            'email' => "abc@gmail.com",
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
        ];

        $user = User::create($data);

        $this->assertDatabaseHas('users', [
            'email' => "abc@gmail.com"
        ]);
        $this->assertInstanceOf(User::class, $user);
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer($a, $b)
    {
        $this->assertSame('first', $a);
        $this->assertSame('second', $b);
    }
}
