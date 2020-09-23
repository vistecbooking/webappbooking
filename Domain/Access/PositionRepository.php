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

interface IPositionRepository
{
	/**
	 * @abstract
	 * @param int $positionId
	 * @return Position
	 */
	public function LoadById($positionId);

	/**
	 * @abstract
	 * @param Position $position
	 * @return int newly inserted position id
	 */
	public function Add(Position $position);

	/**
	 * @abstract
	 * @param Position $position
	 * @return void
	 */
	public function Update(Position $position);

	/**
	 * @abstract
	 * @param Position $position
	 * @return void
	 */
	public function Remove(Position $position);
}

interface IPositionViewRepository
{
	/**
	 * @param int $pageNumber
	 * @param int $pageSize
	 * @param string $sortField
	 * @param string $sortDirection
	 * @param ISqlFilter $filter
	 * @return PageableData|PositionItemView[]
	 */
	public function GetList($pageNumber = null, $pageSize = null, $sortField = null, $sortDirection = null,
							$filter = null);
}

class PositionRepository implements IPositionRepository, IPositionViewRepository
{
	/**
	 * @var DomainCache
	 */
	private $_cache;

	public function __construct()
	{
		$this->_cache = new DomainCache();
	}

	/**
	 * @param int $pageNumber
	 * @param int $pageSize
	 * @param string $sortField
	 * @param string $sortDirection
	 * @param ISqlFilter $filter
	 * @return PageableData|PositionItemView[]
	 */
	public function GetList($pageNumber = null, $pageSize = null, $sortField = null, $sortDirection = null,
							$filter = null)
	{
		$command = new GetAllPositionsCommand();

		if ($filter != null)
		{
			$command = new FilterCommand($command, $filter);
		}

		$builder = array('PositionItemView', 'Create');
		return PageableDataStore::GetList($command, $builder, $pageNumber, $pageSize, $sortField, $sortDirection);
	}
	
	public function LoadById($positionId)
	{
		if ($this->_cache->Exists($positionId))
		{
			return $this->_cache->Get($positionId);
		}

		$position = null;
		$db = ServiceLocator::GetDatabase();

		$reader = $db->Query(new GetPositionByIdCommand($positionId));
		if ($row = $reader->GetRow())
		{
			$position = new Position($row[ColumnNames::POSITION_ID], $row[ColumnNames::POSITION_NAME]);
		}
		$reader->Free();

		$this->_cache->Add($positionId, $position);
		return $position;
	}

	/**
	 * @param Position $position
	 * @return void
	 */
	public function Update(Position $position)
	{
		$db = ServiceLocator::GetDatabase();

		$positionId = $position->Id();

		$db->Execute(new UpdatePositionCommand($positionId, $position->Name()));

		$this->_cache->Add($positionId, $position);
	}

	public function Remove(Position $position)
	{
		ServiceLocator::GetDatabase()->Execute(new DeletePositionCommand($position->Id()));

		$this->_cache->Remove($position->Id());
	}

	public function Add(Position $position)
	{
		$positionId = ServiceLocator::GetDatabase()->ExecuteInsert(new AddPositionCommand($position->Name()));
		$position->WithId($positionId);

		return $positionId;
	}
}

class PositionItemView
{
	public static function Create($row)
	{
		return new PositionItemView($row[ColumnNames::POSITION_ID], $row[ColumnNames::POSITION_NAME]);
	}

	/**
	 * @var int
	 */
	public $Id;

	/**
	 * @return int
	 */
	public function Id()
	{
		return $this->Id;
	}

	/**
	 * @var string
	 */
	public $Name;

	/**
	 * @return string
	 */
	public function Name()
	{
		return $this->Name;
	}

	public function __construct($positionId, $positionName)
	{
		$this->Id = $positionId;
		$this->Name = $positionName;
	}
}
