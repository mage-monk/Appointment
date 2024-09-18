<?php
declare(strict_types=1);

namespace MageMonk\Appointment\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
use MageMonk\Appointment\Api\Data\AppointmentInterface;

interface AppointmentSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return AppointmentInterface[]
     */
    public function getItems(): array;

    /**
     * @param AppointmentInterface[] $items
     * @return void
     */
    public function setItems(array $items): void;
}
