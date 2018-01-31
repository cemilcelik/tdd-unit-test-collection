<?php

namespace Tests\Unit\Calculator;

use PHPUnit\Framework\TestCase;
use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandException;

class DivisionTest extends TestCase
{
	/** @test */
	public function divides_given_operands()
	{
		$division = new Division;

		$division->setOperands([100, 2, 2]);

		$this->assertEquals(25, $division->calculate());
	}

	/** @test */
	public function removes_given_throws_exception_when_calculating()
	{
		$division = new Division;

		$division->setOperands([0, 100, 2, 0, 0, 2, 0, 5]);

		$this->assertEquals(5, $division->calculate());
	}

	/** @test */
	public function no_operands_given_throws_exception_when_calculating()
	{
		$this->expectException(NoOperandException::class);

		$division = new Division;

		$division->calculate();
	}
}
