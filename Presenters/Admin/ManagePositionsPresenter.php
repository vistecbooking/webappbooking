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

require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'Presenters/ActionPresenter.php');
require_once(ROOT_DIR . 'lib/Application/Authentication/namespace.php');

class ManagePositionsActions
{
    const AddPosition = 'addPosition';
    const RenamePosition = 'renamePosition';
    const DeletePosition = 'deletePosition';
}

class ManagePositionsPresenter extends ActionPresenter
{
    /**
     * @var IManagePositionsPage
     */
    private $page;

    /**
     * @var PositionRepository
     */
    private $positionRepository;

    /**
     * @param IManagePositionsPage $page
     * @param PositionRepository $positionRepository
     */
    public function __construct(IManagePositionsPage $page, PositionRepository $positionRepository)
    {
        parent::__construct($page);

        $this->page = $page;
        $this->positionRepository = $positionRepository;

        $this->AddAction(ManagePositionsActions::AddPosition, 'addPosition');
        $this->AddAction(ManagePositionsActions::RenamePosition, 'renamePosition');
        $this->AddAction(ManagePositionsActions::DeletePosition, 'deletePosition');
    }

    public function PageLoad()
    {
        if ($this->page->GetPositionId() != null) {
            $positionList = $this->positionRepository->GetList(1, 1, null, null, new SqlFilterEquals(new SqlFilterColumn(TableNames::POSITIONS, ColumnNames::POSITION_ID), $this->page->GetPositionId()));
        }
        else {
            $positionList = $this->positionRepository->GetList($this->page->GetPageNumber(), $this->page->GetPageSize(), $this->page->GetSortField(), $this->page->GetSortDirection());
        }

        $this->page->BindPositions($positionList->Results());
        $this->page->BindPageInfo($positionList->PageInfo());
    }

    protected function AddPosition()
    {
        $positionName = $this->page->GetPositionName();
        Log::Debug('Adding new position with name: %s', $positionName);

        $position = new Position(0, $positionName);
        $this->positionRepository->Add($position);
    }

    protected function RenamePosition()
    {
        $positionId = $this->page->GetPositionId();
        $positionName = $this->page->GetPositionName();
        Log::Debug('Renaming position id: %s to: %s', $positionId, $positionName);

        $position = $this->positionRepository->LoadById($positionId);
        $position->Rename($positionName);

        $this->positionRepository->Update($position);
    }

    protected function DeletePosition()
    {
        $positionId = $this->page->GetPositionId();

        Log::Debug("Deleting position id: %s", $positionId);

        $position = $this->positionRepository->LoadById($positionId);
        $this->positionRepository->Remove($position);
    }
}

