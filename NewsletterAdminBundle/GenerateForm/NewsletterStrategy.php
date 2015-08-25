<?php

namespace OpenOrchestra\NewsletterAdminBundle\GenerateForm;

use OpenOrchestra\Newsletter\DisplayBlock\Strategies\NewsletterStrategy as BaseStrategy;
use OpenOrchestra\Backoffice\GenerateForm\Strategies\AbstractBlockStrategy;
use OpenOrchestra\ModelInterface\Model\BlockInterface;

/**
 * Class NewsletterStrategy
 */
class NewsletterStrategy extends AbstractBlockStrategy
{
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'newsletter';
    }

    /**
     * @param BlockInterface $block
     *
     * @return bool
     */
    public function support(BlockInterface $block)
    {
        return BaseStrategy::NEWSLETTER === $block->getComponent();
    }
}
