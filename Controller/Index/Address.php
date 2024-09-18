<?php
declare(strict_types=1);

namespace MageMonk\Appointment\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Directory\Model\RegionFactory;

class Address implements ActionInterface
{
    /**
     * Initialization
     *
     * @param JsonFactory $resultJsonFactory
     * @param RegionFactory $regionFactory
     */
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory,
        private readonly  RegionFactory $regionFactory
    ) {
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $regions = $this->regionFactory->create()->getCollection()
            ->addFieldToFilter('country_id', $this->request->getParam('country'));
        return $result->setData(['success' => true, 'value' => $regions->getData()]);
    }

}
