<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;   
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Deloitte\Appointment\Model\AppointmentFactory;

class Create extends Action
{
    /** 
     * @var PageFactory 
     */
    protected $_pageFactory;
    
    /** 
     * @var ResultFactory 
     */
    protected $_resultRedirect;

    /** 
     * @var AppointmentFactory 
     */
    protected $_appointmentFactory;

    /**
     * Initialization
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param ResultFactory  $result
     * @param AppointmentFactory $appointmentFactory
     */
    public function __construct(
        Context $context,
	PageFactory $pageFactory,
        ResultFactory  $result,
        AppointmentFactory $appointmentFactory
    )
    {
        $this->_pageFactory = $pageFactory;
	$this->_appointmentFactory = $appointmentFactory;
        $this->_resultRedirect = $result;
        return parent::__construct($context);
    }

    /**
     * Save Appointment data 
     *
     * @return Page
     */
    public function execute()
    {
        $resultRedirect = $this->_resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        $postData = $this->getRequest()->getPost()->toArray();
        $this->setAppointment($postData);
        return  $resultRedirect;
    }
    public function setAppointment($postData)
    {  
        $appointment = $this->_appointmentFactory->create();
        try {          
            $appointment->setData($postData);
            $appointment->save();
            
            $this->messageManager->addSuccess( __('Your Appointment has been successfully submitted.') );
        } catch (\Exception $e) {
            $this->messageManager->addError(__('We were unable to submit your request. Please try again!'));
        }	
    }
}
