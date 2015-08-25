<?php

namespace OpenOrchestra\NewsletterAdminBundle\EventSubscriber;

use OpenOrchestra\LogBundle\EventSubscriber\AbstractLogSubscriber;
use OpenOrchestra\Newsletter\Event\NewsletterSubscriberEvent;
use OpenOrchestra\Newsletter\Model\NewsletterSubscriberInterface;
use OpenOrchestra\NewsletterBundle\NewsletterSuscriberEvents;

/**
 * Class LogNewsletterSubscriberSubscriber
 */
class LogNewsletterSubscriberSubscriber extends AbstractLogSubscriber
{
    /**
     * @param NewsletterSubscriberEvent $event
     */
    public function create(NewsletterSubscriberEvent $event)
    {
        $this->sendLog('open_orchestra_newsletter.log.create', $event->getNewsletterSubscriber());
    }
    /**
     * @param NewsletterSubscriberEvent $event
     */
    public function update(NewsletterSubscriberEvent $event)
    {
        $this->sendLog('open_orchestra_newsletter.log.update', $event->getNewsletterSubscriber());
    }
    /**
     * @param NewsletterSubscriberEvent $event
     */
    public function delete(NewsletterSubscriberEvent $event)
    {
        $this->sendLog('open_orchestra_newsletter.log.delete', $event->getNewsletterSubscriber());
    }

    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            NewsletterSuscriberEvents::CREATE => 'create',
            NewsletterSuscriberEvents::UPDATE => 'update',
            NewsletterSuscriberEvents::DELETE => 'delete',
        );
    }

    /**
     * @param string                        $message
     * @param NewsletterSubscriberInterface $newsletterSubscriber
     */
    protected function sendLog($message, NewsletterSubscriberInterface $newsletterSubscriber)
    {
        $this->logger->info($message, array('email' => $newsletterSubscriber->getEmail()));
    }
}
