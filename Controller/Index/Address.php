<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context; 

class Address extends Action 
{
    /**
     * Initialization 
     * 
     * @param Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Directory\Model\RegionFactory $regionColFactory
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Directory\Model\RegionFactory $regionColFactory
    ) {
        $this->regionColFactory = $regionColFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $regions = $this->regionColFactory->create()->getCollection()
            ->addFieldToFilter('country_id', $this->getRequest()->getParam('country'));
        return $result->setData(['success' => true, 'value' => $regions->getData()]);
    }

}
