<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandException;
use App\Calculator\Contracts\IOperation;
use App\Calculator\Abstracts\OperationAbstract;

class Addition extends OperationAbstract implements IOperation
{
	public function calculate()
	{
		if (count($this->operands) === 0) {
			throw new NoOperandException;
		}
		return array_sum($this->operands);
	}
}
