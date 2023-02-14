<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Model\ResourceModel;

class Appointment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('deloitte_appointment', 'id');
	}
	
}
