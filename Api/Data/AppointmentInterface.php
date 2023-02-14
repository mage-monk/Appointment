<?php
declare(strict_types=1);

namespace Deloitte\Appointment\Api\Data;

/**
 * Appointment interface.
 * @api
 */
interface AppointmentInterface
{
    /**#@+
     * Constants defined for keys of the data array. Identical to the name of the getter in snake case
     */
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const CONTACT_NUMBER = 'contact_number';
    const ADDRESS = 'address';
    const STATE = 'state';
    const CITY = 'city';
    const COUNTRY = 'country';
    const MODE_OF_APPOINTMENT = 'mode_of_appointment';
    const MODE_OF_COMMUNICATION = 'mode_of_communication';
    const STORE_ID = 'store_id';
    const APPOINTMENT_DATETIME = 'appointment_datetime';
    const PREFERRED_LANGUAGE = 'preferred_langugage';
    const STATUS = 'status';
    const CUSTOMER_ID = 'customer_id';
    const COMMENT = 'comment';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
 
    /**#@-*/

    /**
     * Get appointment id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set appointment id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Get email
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get contact number
     *
     * @return string|null
     */
    public function getContactNumber();

    /**
     * Set contact number
     *
     * @param string $contactNumber
     * @return $this
     */
    public function setContactNumber($contactNumber);

    /**
     * Get address
     *
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address);

    /**
     * Get state
     *
     * @return string|null
     */
    public function getState();

    /**
     * Set state
     *
     * @param string $state
     * @return $this
     */
    public function setState($state);
    
    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city);
    
    /**
     * Get country
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Set country
     *
     * @param string $country
     * @return $this
     */
    public function setCountry($country);
    
    /**
     * Get mode of appointment
     *
     * @return string|null
     */
    public function getModeOfAppointment();

    /**
     * Set mode of appointment
     *
     * @param string $modeOfAppointment
     * @return $this
     */
    public function setModeOfAppointment($modeOfAppointment);
    
    /**
     * Get mode of communication
     *
     * @return string|null
     */
    public function getModeOfCommunication();

    /**
     * Set mode of communication
     *
     * @param string $modeOfCommunication
     * @return $this
     */
    public function setModeOfCommunication($modeOfCommunication);

    /**
     * Get store id
     *
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store id
     *
     * @param string $storeId
     * @return $this
     */
    public function setStoreId($storeId);
    
    /**
     * Get appointment datetime
     *
     * @return string|null
     */
    public function getAppointmentDatetime();

    /**
     * Set appointment datetime
     *
     * @param string $appointmentDatetime
     * @return $this
     */
    public function setAppointmentDatetime($appointmentDatetime);
    
    /**
     * Get preferred language
     *
     * @return string|null
     */
    public function getPreferredLangugage();

    /**
     * Set preferred language
     *
     * @param string $preferredLanguage
     * @return $this
     */
    public function setPreferredLangugage($preferredLanguage);
    
    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status);
    
    /**
     * Get comemnt
     *
     * @return string|null
     */
    public function getComment();

    /**
     * Set comment
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment);
    
     /**
     * Get customer id
     *
     * @return int|null
     */
    public function getCustomerId();

    /**
     * Set customer id
     *
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId);

    /**
     * Get created at time
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created at time
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at time
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated at time
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

}
