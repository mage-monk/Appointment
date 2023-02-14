<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Model;

class Appointment extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface,
\Deloitte\Appointment\Api\Data\AppointmentInterface
{
    const CACHE_TAG = 'deloitte_appointment_appointment';

    protected $_cacheTag = 'deloitte_appointment_appointment';

    protected $_eventPrefix = 'deloitte_appointment_appointment';
        

    protected function _construct()
    {
	$this->_init('Deloitte\Appointment\Model\ResourceModel\Appointment');
    }

    public function getIdentities()
    {
	return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
	$values = [];
	return $values;
    }
    
    public function getId(){
        return $this->_getData(self::ID); 
    }

    public function setId($id) {
        $this->setData(self::ID, $id);
        
    }
    
    public function getName() {
       return $this->_getData(self::NAME); 
    }
    
    public function setName($name): \this {
        $this->setData(self::NAME, $name);
        return $this;
    }
    
    public function getEmail() {
        return $this->_getData(self::EMAIL);
    }
    
    public function setEmail($email): \this {
        $this->setData(self::EMAIL, $email);
        return $this;
    }
    
    public function getContactNumber() {
        return $this->_getData(self::CONTACT_NUMBER);
    }
    
    public function setContactNumber($contactNumber): \this {
        $this->setData(self::CONTACT_NUMBER, $contactNumber);
        return $this;
    }

    public function getAddress() {
        return $this->_getData(self::ADDRESS);
    }
    
    public function setAddress($address): \this {
        $this->setData(self::ADDRESS, $address);
        return $this;
    }

    public function getState() {
        return $this->_getData(self::STATE);
    }
    
    public function setState($state): \this {
        $this->setData(self::STATE, $state);
        return $this;
    }
    
    public function getCity() {
        return $this->_getData(self::CITY);
    }
    
    public function setCity($city): \this {
        $this->setData(self::CITY, $city);
        return $this;
    }
    
    public function getCountry() {
        return $this->_getData(self::COUNTRY);
    }
    
    public function setCountry($country): \this {
       $this->setData(self::COUNTRY, $country); 
       return $this;
    }
    
    public function getModeOfAppointment() {
        return $this->_getData(self::MODE_OF_APPOINTMENT);
    }

    public function setModeOfAppointment($modeOfAppointment): \this {
        $this->setData(self::MODE_OF_APPOINTMENT, $modeOfAppointment); 
        return $this;
    }
    
    public function getModeOfCommunication() {
        return $this->_getData(self::MODE_OF_COMMUNICATION);
    }
    
    public function setModeOfCommunication($modeOfCommunication): \this {
        $this->setData(self::MODE_OF_COMMUNICATION, $modeOfCommunication); 
        return $this;
    }
    
    public function getStoreId() {
        return $this->_getData(self::STORE_ID);
    }
    
    public function setStoreId($storeId): \this {
        $this->setData(self::STORE_ID, $storeId); 
        return $this;
    }
    
    public function getAppointmentDatetime() {
        return $this->_getData(self::APPOINTMENT_DATETIME);
    }

    public function setAppointmentDatetime($appointmentDatetime): \this {
        $this->setData(self::APPOINTMENT_DATETIME, $appointmentDatetime); 
        return $this;
    }

    public function getPreferredLangugage() {
        return $this->_getData(self::PREFERRED_LANGUAGE);
    }
    
    public function setPreferredLangugage($preferredLanguage): \this {
        $this->setData(self::PREFERRED_LANGUAGE, $preferredLanguage); 
        return $this;
    }
    
    public function getStatus() {
        return $this->_getData(self::STATUS);
    }
    
    public function setStatus($status): \this {
        $this->setData(self::STATUS, $status); 
        return $this;
    }
    
    public function getCustomerId() {
        return $this->_getData(self::CUSTOMER_ID);
    }
    
    public function setCustomerId($customerId): \this {
        $this->setData(self::CUSTOMER_ID, $customerId);
        return $this;
    }
    
    public function getComment() {
        return $this->_getData(self::COMMENT);
    }
    
    public function setComment($comment): \this {
       $this->setData(self::COMMENT, $comment); 
       return $this;
    }

    public function getCreatedAt() {
        return $this->_getData(self::CREATED_AT);
    }
    
    public function setCreatedAt($createdAt): \this {
        $this->setData(self::CREATED_AT, $createdAt); 
        return $this;
    }
    
    public function getUpdatedAt() {
       return $this->_getData(self::UPDATED_AT); 
    }
    
    public function setUpdatedAt($updatedAt): \this {
       $this->setData(self::UPDATED_AT, $updatedAt); 
       return $this;
    }

}