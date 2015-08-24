<?php

namespace OpenOrchestra\NewsletterAdminBundle\NavigationPanel;

use OpenOrchestra\Backoffice\NavigationPanel\Strategies\AbstractNavigationPanelStrategy;

/**
 * Class NewsletterSubscriberPanelStrategy
 */
class NewsletterSubscriberPanelStrategy extends AbstractNavigationPanelStrategy
{
    /**
     * @return string
     */
    public function show()
    {
        return $this->render('OpenOrchestraNewsletterAdminBundle:NavigationPanel:newsletter_subscriber.html.twig');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletter_subscriber';
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return self::ADMINISTRATION;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return 'ROLE_USER';
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return 60;
    }
}
