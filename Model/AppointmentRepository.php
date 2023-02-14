<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Deloitte\Appointment\Api\Data\AppointmentInterface;
use Deloitte\Appointment\Api\Data\AppointmentSearchResultInterface;
use Deloitte\Appointment\Api\Data\AppointmentSearchResultInterfaceFactory;
use Deloitte\Appointment\Api\AppointmentRepositoryInterface;
use Deloitte\Appointment\Model\ResourceModel\Appointment\CollectionFactory as AppointmentCollectionFactory;
use Deloitte\Appointment\Model\ResourceModel\Appointment\Collection;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    /**
     * @var AppointmentFactory
     */
    private $AppointmentFactory;

    /**
     * @var AppointmentCollectionFactory
     */
    private $AppointmentCollectionFactory;

    /**
     * @var AppointmentSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    public function __construct(
        AppointmentFactory $AppointmentFactory,
        AppointmentCollectionFactory $AppointmentCollectionFactory,
        AppointmentSearchResultInterfaceFactory $searchResultFactory
    ) {
        $this->AppointmentFactory = $AppointmentFactory;
        $this->AppointmentCollectionFactory = $AppointmentCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
    }

    public function getById($id): AppointmentInterface {
        $appointment = $this->AppointmentFactory->create();
        $appointment->getResource()->load($appointment, $id);
        if (!$appointment->getId()) {
            throw new NoSuchEntityException(__('Unable to find appointment with ID "%1"', $id));
        }
        return $appointment;
    }
    
    public function save(AppointmentInterface $appointment): AppointmentInterface {
        $appointment->getResource()->save($appointment);
        return $appointment;
    }
    
    public function delete(AppointmentInterface $appointment): void {
        $appointment->getResource()->delete($appointment);
    }

    public function getList(SearchCriteriaInterface $searchCriteria): AppointmentSearchResultInterface
    {
        $collection = $this->collectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

   



    

}
