<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Model\ResourceModel\Appointment;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'deloitte_appointment_collection';
	protected $_eventObject = 'appointment_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Deloitte\Appointment\Model\Appointment', 'Deloitte\Appointment\Model\ResourceModel\Appointment');
	}

}

