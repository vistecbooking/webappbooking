<?php
/**
 * Copyright 2011-2017 Nick Korbel
 *
 * This file is part of Booked Scheduler.
 *
 * Booked Scheduler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Booked Scheduler is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'Pages/Admin/AdminPage.php');
require_once(ROOT_DIR . 'Pages/IPageable.php');
require_once(ROOT_DIR . 'Presenters/Admin/ManagePositionsPresenter.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');

interface IManagePositionsPage extends IActionPage
{
	/**
	 * @abstract
	 * @return int
	 */
	public function GetPositionId();

	/**
	 * @abstract
	 * @param $positions PsitionItemView[]|array
	 * @return void
	 */
	public function BindPositions($positions);

	/**
	 * @abstract
	 * @param PageInfo $pageInfo
	 * @return void
	 */
	public function BindPageInfo(PageInfo $pageInfo);

	/**
	 * @abstract
	 * @return int
	 */
	public function GetPageNumber();

	/**
	 * @abstract
	 * @return int
	 */
	public function GetPageSize();

	/**
	 * @abstract
	 * @param $response string
	 * @return void
	 */
	public function SetJsonResponse($response);

	/**
	 * @abstract
	 * @return string
	 */
	public function GetPositionName();
}

class ManagePositionsPage extends ActionPage implements IManagePositionsPage
{
	/**
	 * @var ManagePositionsPresenter
	 */
	protected $presenter;

	/**
	 * @var PageablePage
	 */
	private $pageable;

	public function __construct()
	{
		parent::__construct('ManagePositions', 1);
		$this->presenter = new ManagePositionsPresenter($this, new PositionRepository());

		$this->pageable = new PageablePage($this);
	}

	public function ProcessPageLoad()
	{
		$this->presenter->PageLoad();
		$this->Display('Admin/manage_positions.tpl');
	}

	public function BindPageInfo(PageInfo $pageInfo)
	{
		$this->pageable->BindPageInfo($pageInfo);
	}

	public function GetPageNumber()
	{
		return $this->pageable->GetPageNumber();
	}

	public function GetPageSize()
	{
		return $this->pageable->GetPageSize();
	}

	public function BindPositions($positions)
	{
		$this->Set('positions', $positions);
	}

	public function ProcessAction()
	{
		$this->presenter->ProcessAction();
	}

	/**
	 * @param $dataRequest string
	 * @return void
	 */
	public function ProcessDataRequest($dataRequest)
	{
		// no-op
	}

	/**
	 * @return int
	 */
	public function GetPositionId()
	{
		$positionId = $this->GetForm(FormKeys::POSITION_ID);
		if (!empty($positionId))
		{
			return $positionId;
		}
		return $this->GetQuerystring(QueryStringKeys::POSITION_ID);
	}

	public function SetJsonResponse($response)
	{
		parent::SetJson($response);
	}

	public function GetPositionName()
	{
		return $this->GetForm(FormKeys::POSITION_NAME);
	}
}

