<?php

namespace OpenOrchestra\NewsletterModelBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('open_orchestra_newsletter_model');

        $rootNode->children()
            ->arrayNode('document')
                ->addDefaultsIfNotSet()
                ->children()
                ->arrayNode('newsletter_subscriber')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->defaultValue('OpenOrchestra\NewsletterModelBundle\Document\NewsletterSubscriber')->end()
                        ->scalarNode('repository')->defaultValue('OpenOrchestra\NewsletterModelBundle\Repository\NewsletterSubscriberRepository')->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
