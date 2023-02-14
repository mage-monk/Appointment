<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface AppointmentSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Deloitte\Appointment\Api\Data\AppointmentInterface[]
     */
    public function getItems();

    /**
     * @param \Deloitte\Appointment\Api\Data\AppointmentInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
