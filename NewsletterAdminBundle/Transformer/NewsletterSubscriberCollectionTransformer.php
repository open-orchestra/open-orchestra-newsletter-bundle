<?php

namespace OpenOrchestra\NewsletterAdminBundle\Transformer;

use Doctrine\Common\Collections\Collection;
use OpenOrchestra\BaseApi\Facade\FacadeInterface;
use OpenOrchestra\BaseApi\Transformer\AbstractTransformer;
use OpenOrchestra\NewsletterAdminBundle\Facade\NewsletterSubscriberCollectionFacade;

/**
 * Class NewsletterSubscriberCollectionTransformer
 */
class NewsletterSubscriberCollectionTransformer extends AbstractTransformer
{
    /**
     * @param Collection $roleCollection
     *
     * @return FacadeInterface
     */
    public function transform($roleCollection)
    {
        $facade = new NewsletterSubscriberCollectionFacade();

        foreach ($roleCollection as $role) {
            $facade->addNewsletterSubscriber($this->getTransformer('newsletter_subscriber')->transform($role));
        }

        $facade->addLink('_self', $this->generateRoute(
            'open_orchestra_api_newsletter_subscriber_list',
            array()
        ));

        $facade->addLink('_self_add', $this->generateRoute(
            'open_orchestra_newsletter_subscriber_new',
            array()
        ));

        return $facade;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletter_subscriber_collection';
    }
}
