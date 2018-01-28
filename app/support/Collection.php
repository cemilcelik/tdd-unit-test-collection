<?php

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;

class Collection implements IteratorAggregate
{
	public $items = [];

	public function __construct(array $items = [])
	{
		$this->items = $items;
	}

	public function get()
	{
		return $this->items;
	}

	public function count()
	{
		return count($this->items);
	}

	public function getIterator()
	{
		return new ArrayIterator($this->items);
	}

	public function add(array $items)
	{
		$this->items = array_merge($this->items, $items);
	}

	public function merge(Collection $collection)
	{
		$this->add($collection->get());
	}
}
