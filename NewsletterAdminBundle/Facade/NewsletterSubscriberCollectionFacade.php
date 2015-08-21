<?php

namespace OpenOrchestra\NewsletterAdminBundle\Facade;

use OpenOrchestra\ApiBundle\Facade\PaginateCollectionFacade;
use OpenOrchestra\BaseApi\Facade\FacadeInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class NewsletterSubscriberCollectionFacade
 */
class NewsletterSubscriberCollectionFacade extends PaginateCollectionFacade
{
    /**
     * @Serializer\Type("string")
     */
    public $collectionName = 'newsletter_subscribers';

    /**
     * @Serializer\Type("array<OpenOrchestra\NewsletterAdminBundle\Facade\NewsletterSubscriberFacade>")
     */
    protected $newsletterSubscribers = array();

    /**
     * @param FacadeInterface $facade
     */
    public function addNewsletterSubscriber(FacadeInterface $facade)
    {
        $this->newsletterSubscribers[] = $facade;
    }
}
