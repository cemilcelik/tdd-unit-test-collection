<?php

namespace Tests\Unit\Calculator;

use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandException;

class AdditionTest extends TestCase
{
	/** @test */
	public function add_up_given_operands()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10, 15]);
		$result = $addition->calculate();

		$this->assertEquals(30, $result);
	}

	/** @test */
	public function no_operands_given_throws_exception_when_calculating()
	{
		$this->expectException(NoOperandException::class);

		$addition = new Addition;

		$result = $addition->calculate();
	}
}
