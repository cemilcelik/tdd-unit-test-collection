<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use IteratorAggregate;
use ArrayIterator;
use App\Support\Collection;

class CollectionTest extends TestCase
{
	/** @test */
	public function empty_instantiated_collection_returns_no_items()
	{
		$collection = new Collection;

		$this->assertEmpty($collection->get());
	}

	/** @test */
	public function count_is_correct_for_items_passed_in()
	{
		$collection = new Collection([
			'one', 'two', 'three'
		]);

		$this->assertEquals(3, $collection->count());
	}

	/** @test */
	public function items_returned_match_items_passed_in()
	{
		$collection = new Collection([
			'one', 'two'
		]);

		$this->assertCount(2, $collection->get());
		$this->assertEquals('one', $collection->get()[0]);
		$this->assertEquals('two', $collection->get()[1]);
	}

	/** @test */
	public function collection_is_instance_of_iterator_aggregate()
	{
		$collection = new Collection;

		$this->assertInstanceOf(IteratorAggregate::class, $collection);
	}

	/** @test */
	public function collection_can_be_iterated()
	{
		$collection = new Collection([
			'one', 'two', 'three'
		]);

		$items = [];

		foreach ($collection as $key => $value) {
			$items[$key] = $value;
		}

		$this->assertCount(3, $items);
		$this->assertEquals($items, $collection->get());
		$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
	}

	/** @test */
	public function collection_can_be_merged_with_another_collection()
	{
		$collection1 = new Collection(['one', 'two']);
		$collection2 = new Collection(['three', 'four', 'five']);

		$collection1->merge($collection2);

		$this->assertCount(5, $collection1->get());
	}

	/** @test */
	public function can_add_to_existing_collection()
	{
		$collection = new Collection(['one', 'two']);
		$collection->add(['three']);

		$this->assertCount(3, $collection->get());
		$this->assertEquals(3, $collection->count());
		$this->assertEquals('three', $collection->get()[2]);
		$this->assertContains('three', $collection->get());
	}

	/** @test */
	public function returns_json_encoded_items()
	{
		$collection = new Collection([
			['username' => 'johndoe', 'email' => 'john@doe.com'],
			['username' => 'janedoe', 'email' => 'jane@doe.com']
		]);

		$this->assertInternalType('string', $collection->toJson());
		$this->assertEquals('[{"username":"johndoe","email":"john@doe.com"},{"username":"janedoe","email":"jane@doe.com"}]', $collection->toJson());
	}

	/** @test */
	public function jsn_encoding_a_collection_object_returns_json(Type $var = null)
	{
		$collection = new Collection([
			['username' => 'johndoe', 'email' => 'john@doe.com'],
			['username' => 'janedoe', 'email' => 'jane@doe.com']
		]);

		$encoded = json_encode($collection);

		$this->assertInternalType('string', $encoded);
		$this->assertEquals('[{"username":"johndoe","email":"john@doe.com"},{"username":"janedoe","email":"jane@doe.com"}]', $encoded);
	}
}
