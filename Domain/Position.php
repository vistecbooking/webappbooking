<?php
/**
Copyright 2011-2017 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*/

class Position
{
	private $id;
	private $name;

	/**
	 * @param $id int
	 * @param $name string
	 */
	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	/**
	 * @return int
	 */
	public function Id()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function Name()
	{
		return $this->name;
	}

	/**
	 * @param $positionName string
	 * @return void
	 */
	public function Rename($positionName)
	{
		$this->name = $positionName;
	}

	/**
	 * @internal
	 * @param $positionId
	 * @return void
	 */
	public function WithId($positionId)
	{
		$this->id = $positionId;
	}

	public static function Null()
	{
		return new NullPosition();
	}
}

class NullPosition extends Position
{
	public function __construct()
	{
		parent::__construct(0, null);
	}
}