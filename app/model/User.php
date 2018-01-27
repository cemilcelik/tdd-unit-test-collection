<?php

namespace App\Model;

class User
{
	public $first_name;
	public $last_name;

	public function __construct(Array $user = [])
	{
		if (isset($user['first_name'])) 
			$this->setFirstName($user['first_name']);
			
		if (isset($user['last_name']))
			$this->setLastName($user['last_name']);
	}

	public function setFirstName(String $firstName = ''): void
	{
		$this->first_name = trim($firstName);
	}

	public function getFirstName(): string
	{
		return $this->first_name;
	}

	public function setLastName(String $lastName = ''): void
	{
		$this->last_name = trim($lastName);
	}

	public function getLastName(): string
	{
		return $this->last_name;
	}

	public function getFullName(): string
	{
		return $this->getFirstName() . ' ' . $this->getLastName();
	}

	public function getUserProperties(): array
	{
		return [
			'full_name' => $this->getFullName()
		];
	}
}
