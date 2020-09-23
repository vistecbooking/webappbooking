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

require_once(ROOT_DIR . 'lib/Config/namespace.php');
require_once(ROOT_DIR . 'lib/Server/namespace.php');
require_once(ROOT_DIR . 'lib/Common/namespace.php');
require_once(ROOT_DIR . 'lib/Application/Authorization/namespace.php');
require_once(ROOT_DIR . 'Domain/namespace.php');
require_once(ROOT_DIR . 'Domain/Access/namespace.php');
require_once(ROOT_DIR . 'Presenters/ActionPresenter.php');

abstract class ReservationPresenterBase extends ActionPresenter implements IReservationPresenter
{
	/**
	 * @var IReservationPage
	 */
	protected $basePage;

	/**
	 * @var IAttributeService
	 */
	private $attributeService;

	protected function __construct(IReservationPage $page)
	{
		parent::__construct($page);

		$this->basePage = $page;
		$this->attributeService = new AttributeService(new AttributeRepository());
		
		$this->AddAction(ReservationAction::Create, 'CreateReservation');
		$this->AddAction(ReservationAction::Update, 'UpdateReservation');
	}

	public abstract function PageLoad();

	public function CreateReservation()
	{
		$this->basePage->CreateReservationAction();
	}

	public function UpdateReservation()
	{
		$this->basePage->UpdateReservationAction();
	}

	protected function LoadValidators($action)
	{
		if ($action != ReservationAction::Create && $action != ReservationAction::Update)
		{
			return;
		}

		$userId = ServiceLocator::GetServer()->GetUserSession()->UserId;
		// $this->basePage->RegisterValidator('rtitle', new RequiredValidator($this->basePage->GetTitle()));
		$this->basePage->RegisterValidator('additionalattributes', new AttributeValidator($this->attributeService, CustomAttributeCategory::RESERVATION, $this->GetAttributeValues(), $userId));
	}

	/**
	 * @return array|AttributeValue[]
	 */
	private function GetAttributeValues()
	{
		$attributes = array();
		foreach ($this->basePage->GetAttributes() as $attribute)
		{
			$attributes[] = new AttributeValue($attribute->Id, $attribute->Value);
		}
		return $attributes;
	}
}

class ReservationPresenter extends ReservationPresenterBase
{
	/**
	 * @var INewReservationPage
	 */
	private $_page;

	/**
	 * @var IReservationInitializerFactory
	 */
	private $initializationFactory;

	/**
	 * @var IReservationPreconditionService
	 */
	private $preconditionService;

	public function __construct(
		INewReservationPage $page,
		IReservationInitializerFactory $initializationFactory,
		INewReservationPreconditionService $preconditionService)
	{
		parent::__construct($page);

		$this->_page = $page;
		$this->initializationFactory = $initializationFactory;
		$this->preconditionService = $preconditionService;
	}

	public function PageLoad()
	{
		$user = ServiceLocator::GetServer()->GetUserSession();
		$this->preconditionService->CheckAll($this->_page, $user);
		$initializer = $this->initializationFactory->GetNewInitializer($this->_page);
		$initializer->Initialize();
	}
}

class EditReservationPresenter extends ReservationPresenterBase
{
	/**
	 * @var IExistingReservationPage
	 */
	private $page;

	/**
	 * @var IReservationInitializerFactory
	 */
	private $initializationFactory;

	/**
	 * @var EditReservationPreconditionService
	 */
	private $preconditionService;

	/**
	 * @var IReservationViewRepository
	 */
	private $reservationViewRepository;

	public function __construct(
		IExistingReservationPage $page,
		IReservationInitializerFactory $initializationFactory,
		EditReservationPreconditionService $preconditionService,
		IReservationViewRepository $reservationViewRepository)
	{
		parent::__construct($page);

		$this->page = $page;
		$this->initializationFactory = $initializationFactory;
		$this->preconditionService = $preconditionService;
		$this->reservationViewRepository = $reservationViewRepository;
	}

	public function PageLoad()
	{
		$user = ServiceLocator::GetServer()->GetUserSession();

		$referenceNumber = $this->page->GetReferenceNumber();
		$reservationView = $this->reservationViewRepository->GetReservationForEditing($referenceNumber);

		$this->preconditionService->CheckAll($this->page, $user, $reservationView);
		$initializer = $this->initializationFactory->GetExistingInitializer($this->page, $reservationView);
		$initializer->Initialize();
	}
}

interface IReservationPresenter
{}