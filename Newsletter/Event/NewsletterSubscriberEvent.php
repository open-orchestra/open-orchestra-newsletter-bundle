<?php

namespace OpenOrchestra\Newsletter\Event;

use OpenOrchestra\Newsletter\Model\NewsletterSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class NewsletterSubscriberEvent
 */
class NewsletterSubscriberEvent extends Event
{
    protected $newsletterSubscriber;

    /**
     * @param NewsletterSubscriberInterface $newsletterSubscriber
     */
    public function __construct(NewsletterSubscriberInterface $newsletterSubscriber)
    {
        $this->newsletterSubscriber = $newsletterSubscriber;
    }

    /**
     * @return NewsletterSubscriberInterface
     */
    public function getNewsletterSubscriber()
    {
        return $this->newsletterSubscriber;
    }
}
