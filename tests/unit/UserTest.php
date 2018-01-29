<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Model\User;

class UserTest extends TestCase
{
	public $user;

	public function setUp()
	{
		$this->user = new User;
	}

	/** @test */
	public function assert_construct(Type $var = null)
	{
		$user = new User([
			'first_name' => 'John',
			'last_name' => 'Doe',
			'email' => 'john@doe.com'
		]);

		$this->assertEquals($user->getFirstName(), 'John');
		$this->assertEquals($user->getLastName(), 'Doe');
	}

	public function testAssertGetFirstName()
	{
		$this->user->setFirstName('John');

		$this->assertEquals($this->user->getFirstName(), 'John');
	}

	/** @test */
	public function assert_get_last_name()
	{
		$this->user->setLastName('Doe');

		$this->assertEquals($this->user->getLastName(), 'Doe');
	}

	/** @test */
	public function assert_get_full_name(Type $var = null)
	{
		$this->user->setFirstName('John');
		$this->user->setLastName('Doe');

		$this->assertEquals($this->user->getFullName(), 'John Doe');
	}

	/** @test */
	public function assert_trimmed_first_and_last_name()
	{
		$this->user->setFirstName('   John   ');
		$this->user->setLastName('   Doe   ');

		$this->assertEquals($this->user->getFirstName(), 'John');
		$this->assertEquals($this->user->getLastName(), 'Doe');
	}

	/** @test */
	public function assert()
	{
		$this->user->setFirstName('John');
		$this->user->setLastName('Doe');
		$userProperties = $this->user->getUserProperties();

		$this->assertArrayHasKey('full_name', $userProperties);
	}
}
