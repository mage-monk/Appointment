<?php
declare(strict_types=1);

namespace MageMonk\Appointment\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use MageMonk\Appointment\Model\AppointmentFactory;
use Magento\Framework\Message\ManagerInterface;


class Save implements HttpPostActionInterface, CsrfAwareActionInterface
{

    /**
     * Initialization
     *
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     * @param AppointmentFactory $appointmentFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        private readonly RequestInterface $request,
        private readonly ResultFactory $resultFactory,
        private readonly AppointmentFactory $appointmentFactory,
        private readonly ManagerInterface $messageManager
    ) {
    }

    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $postData = $this->request->getParams();
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

    public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }
}
