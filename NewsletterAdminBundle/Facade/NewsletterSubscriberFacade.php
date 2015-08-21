<?php

namespace OpenOrchestra\NewsletterAdminBundle\Facade;

use JMS\Serializer\Annotation as Serializer;
use OpenOrchestra\BaseApi\Facade\AbstractFacade;

/**
 * Class NewsletterSubscriberFacade
 */
class NewsletterSubscriberFacade extends AbstractFacade
{
    /**
     * @Serializer\Type("string")
     */
    public $lastName;

    /**
     * @Serializer\Type("string")
     */
    public $firstName;

    /**
     * @Serializer\Type("string")
     */
    public $email;

    /**
     * @Serializer\Type("string")
     */
    public $siteId;
}
