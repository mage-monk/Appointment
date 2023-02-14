<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Deloitte\Appointment\Model\AppointmentFactory;
 
class Save extends Action
{
    protected $request;
    protected $appointmentFactory;
    protected $resultFactory;
    protected $jsonHelper;
    protected $date;
    
    /**
     * Initialization
     * 
     * @param Context $context
     * @param AppointmentFactory $appointmentFactory
     * @param ResultFactory $resultFactory
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     */
    public function __construct(
        Context $context,
        AppointmentFactory $appointmentFactory,
        ResultFactory $resultFactory,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        $this->appointmentFactory = $appointmentFactory;
        $this->resultFactory = $resultFactory;
        $this->jsonHelper = $jsonHelper;
        $this->date = $date;
        parent::__construct($context);
    }   
 
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $postData = $this->getRequest()->getPost()->toArray();     
        try {
            //$date = $this->date->gmtDate();
            $appointment = $this->appointmentFactory->create();
            $appointment->setData($postData);
            $appointment->save();
            $this->messageManager->addSuccess( __('Appointment has been successfully saved.') );
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(nl2br($e->getMessage()));           
        }
      
        return $resultRedirect->setPath("*/*/");
    }
}
