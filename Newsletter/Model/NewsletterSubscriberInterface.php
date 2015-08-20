<?php

namespace OpenOrchestra\Newsletter\Model;


/**
 * Interface NewsletterSubscriberInterface
 */
interface NewsletterSubscriberInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $lastName
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $email
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getEmail();
}
