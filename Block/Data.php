<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Block;

class Data extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Customer\Model\Session 
     */
    protected $customerSession;
    
    /**
     * @var \Magento\Inventory\Model\ResourceModel\Source\CollectionFactory 
     */
    protected $sourceCollectionFactory;
    
    /**
     * @var \Deloitte\Appointment\Model\AppointmentFactory
     */
    protected $appointmentFactory;
    
    /**
     * @var \Magento\Directory\Block\Data 
     */
    protected $directoryBlock;

    /**
     * Initialization
     * 
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Inventory\Model\ResourceModel\Source\CollectionFactory $SourceCollectionFactory
     * @param \Deloitte\Appointment\Model\AppointmentFactory $appointmentFactory
     * @param \Magento\Directory\Block\Data $directoryBlock
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Inventory\Model\ResourceModel\Source\CollectionFactory  $SourceCollectionFactory,
        \Deloitte\Appointment\Model\AppointmentFactory $appointmentFactory,
        \Magento\Directory\Block\Data $directoryBlock, 
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->sourceCollectionFactory = $SourceCollectionFactory;
        $this->appointmentFactory = $appointmentFactory;
        $this->directoryBlock = $directoryBlock;
    }

    /**
     * Get current customer information
     *
     * @return \Magento\Customer\Model\Customer
     */
    public function getCustomer()
    {
        return $this->customerSession->getCustomer();
        
    }
    
    /**
     * Get stores information
     *
     * @return Stores
     */
    public function getStores() {
       $collection = $this->sourceCollectionFactory->create()
            ->addFieldToSelect('*')
            ->getData();
       return $collection;
    }

    /**
     * Get customer's appointment data
     *
     * @return appointment
     */
    public function getAppointments()
    {
       $customerId = $this->getCustomer()->getId();
       $collection = $this->appointmentFactory->create()
            ->getCollection()
            ->addFieldToSelect('*')
            ->addFieldToFilter('customer_id', $customerId)
            ->getData();
       return $collection;
    }
    
    /**
     * Get state and country values 
     *
     * @return country
     */
    public function getCountries()
    {
        $country = $this->directoryBlock->getCountryHtmlSelect();
        return $country;
    }
    
    /**
     * Get state and region values 
     *
     * @return region
     */
    public function getRegion()
    {
        $region = $this->directoryBlock->getRegionHtmlSelect();
        return $region;
    }
}
