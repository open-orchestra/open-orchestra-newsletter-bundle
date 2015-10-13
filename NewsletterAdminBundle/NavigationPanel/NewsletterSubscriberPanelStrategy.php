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
}
