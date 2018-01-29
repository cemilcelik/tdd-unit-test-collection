<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandException;
use App\Calculator\Contracts\IOperation;

class Addition implements IOperation
{
	public $operands = [];
	
	public function setOperands(array $operands)
	{
		$this->operands = $operands;
	}

	public function calculate()
	{
		if (count($this->operands) === 0) {
			throw new NoOperandException;
		}
		return array_sum($this->operands);
	}
}
