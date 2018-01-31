<?php

namespace App\Calculator\Abstracts;

abstract class OperationAbstract
{
	public $operands = [];

	public function setOperands(array $operands)
	{
		$this->operands = $operands;
	}
}
