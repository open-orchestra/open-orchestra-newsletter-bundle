<?php

namespace OpenOrchestra\Newsletter\Factory;

use OpenOrchestra\BaseBundle\Context\CurrentSiteIdInterface;
use OpenOrchestra\Newsletter\Model\NewsletterSubscriberInterface;

/**
 * Class NewsletterSubscriberFactory
 */
class NewsletterSubscriberFactory
{
    protected $class;
    protected $currentSiteManager;

    /**
     * @param string                 $class
     * @param CurrentSiteIdInterface $currentSiteManager
     */
    public function __construct($class, CurrentSiteIdInterface $currentSiteManager)
    {
        $this->class = $class;
        $this->currentSiteManager = $currentSiteManager;
    }

    /**
     * @return NewsletterSubscriberInterface
     */
    public function create()
    {
        /** @var NewsletterSubscriberInterface $newsletterSubscriber */
        $newsletterSubscriber =  new $this->class();

        $newsletterSubscriber->setSiteId($this->currentSiteManager->getCurrentSiteId());

        return $newsletterSubscriber;
    }
}
