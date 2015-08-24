<?php

namespace OpenOrchestra\NewsletterModelBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use OpenOrchestra\Newsletter\Model\NewsletterSubscriberInterface;
use OpenOrchestra\Mapping\Annotations as ORCHESTRA;

/**
 * Description of NewsletterSubscriber
 *
 * @ODM\Document(
 *   collection="newsletter_subscriber",
 *   repositoryClass="OpenOrchestra\NewsletterModelBundle\Repository\NewsletterSubscriberRepository"
 * )
 */
class NewsletterSubscriber implements NewsletterSubscriberInterface
{
    /**
     * @var string $id
     *
     * @ODM\Id
     */
    protected $id;

    /**
     * @var string $lastName
     *
     * @ODM\Field(type="string")
     * @ORCHESTRA\Search(key="last_name")
     */
    protected $lastName;

    /**
     * @var string $firstName
     *
     * @ODM\Field(type="string")
     * @ORCHESTRA\Search(key="first_name")
     */
    protected $firstName;

    /**
     * @var string $email
     *
     * @ODM\Field(type="string")
     * @ORCHESTRA\Search(key="email")
     */
    protected $email;

    /**
     * @var string $siteId
     *
     * @ODM\Field(type="string")
     * @ORCHESTRA\Search(key="site_id")
     */
    protected $siteId;

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param string $siteId
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
    }
}
