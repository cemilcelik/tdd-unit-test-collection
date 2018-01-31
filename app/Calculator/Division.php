<?php

namespace App\Calculator;

use App\Calculator\Contracts\IOperation;
use App\Calculator\Abstracts\OperationAbstract;
use App\Calculator\Exceptions\NoOperandException;

class Division extends OperationAbstract implements IOperation
{
	public function calculate()
	{
		if (count($this->operands) === 0) {
			throw new NoOperandException;
		}

		return array_reduce(array_filter($this->operands), function($a, $b) {
			if ($a !== null & $b !== null) {
				return $a / $b;
			}
			return $b;
		});
	}
}
