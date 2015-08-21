<?php

namespace OpenOrchestra\NewsletterAdminBundle\Transformer;

use OpenOrchestra\BaseApi\Facade\FacadeInterface;
use OpenOrchestra\BaseApi\Transformer\AbstractTransformer;
use OpenOrchestra\Newsletter\Model\NewsletterSubscriberInterface;
use OpenOrchestra\NewsletterAdminBundle\Facade\NewsletterSubscriberFacade;

/**
 * Class NewsletterSubscriberTransformer
 */
class NewsletterSubscriberTransformer extends AbstractTransformer
{
    /**
     * @param mixed|NewsletterSubscriberInterface $newsletterSubscriber
     *
     * @return FacadeInterface
     */
    public function transform($newsletterSubscriber)
    {
        $facade = new NewsletterSubscriberFacade();

        $facade->lastName = $newsletterSubscriber->getLastName();
        $facade->firstName = $newsletterSubscriber->getFirstName();
        $facade->email = $newsletterSubscriber->getEmail();
        $facade->siteId = $newsletterSubscriber->getSiteId();

        $facade->addLink('_self', $this->generateRoute(
            'open_orchestra_api_newsletter_subscriber_show',
            array('newsletterSubscriberId' => $newsletterSubscriber->getId())
        ));
        $facade->addLink('_self_delete', $this->generateRoute(
            'open_orchestra_api_newsletter_subscriber_delete',
            array('newsletterSubscriberId' => $newsletterSubscriber->getId())
        ));
        $facade->addLink('_self_form', $this->generateRoute(
            'open_orchestra_newsletter_subscriber_form',
            array('newsletterSubscriberId' => $newsletterSubscriber->getId())
        ));

        return $facade;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletter_subscriber';
    }
}
