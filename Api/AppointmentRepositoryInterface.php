<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Deloitte\Appointment\Api\Data\AppointmentInterface;

interface AppointmentRepositoryInterface
{
    /**
     * @param int $id
     * @return \Deloitte\Appointment\Api\Data\AppointmentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Deloitte\Appointment\Api\Data\AppointmentInterface $appointment
     * @return \Deloitte\Appointment\Api\Data\AppointmentInterface
     */
    public function save(AppointmentInterface $appointment);

    /**
     * @param \Deloitte\Appointment\Api\Data\AppointmentInterface $appointment
     * @return void
     */
    public function delete(AppointmentInterface $appointment);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Deloitte\Appointment\Api\Data\AppointmentSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
