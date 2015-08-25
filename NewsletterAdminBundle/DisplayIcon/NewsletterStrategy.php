<?php

namespace OpenOrchestra\NewsletterAdminBundle\DisplayIcon;

use OpenOrchestra\BackofficeBundle\DisplayIcon\Strategies\AbstractStrategy;
use OpenOrchestra\Newsletter\DisplayBlock\Strategies\NewsletterStrategy as BaseStrategy;

/**
 * Class NewsletterStrategy
 */
class NewsletterStrategy extends AbstractStrategy
{
    /**
     * Check if the strategy support this block
     *
     * @param string $block
     *
     * @return boolean
     */
    public function support($block)
    {
        return BaseStrategy::NEWSLETTER === $block;
    }

    /**
     * Perform the show action for a block
     *
     * @return string
     */
    public function show()
    {
        return $this->render('OpenOrchestraNewsletterAdminBundle:Block/Newsletter:showIcon.html.twig');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletter';
    }
}
