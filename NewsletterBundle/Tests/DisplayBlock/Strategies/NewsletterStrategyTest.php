<?php

namespace OpenOrchestra\NewsletterBundle\Tests\DisplayBlock\Strategies;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\ContactStrategy;
use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\TinyMCEWysiwygStrategy;
use OpenOrchestra\Newsletter\DisplayBlock\Strategies\NewsletterStrategy;
use Phake;

/**
 * Test NewsletterStrategyTest
 */
class NewsletterStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NewsletterStrategy
     */
    protected $strategy;

    protected $block;
    protected $factory;
    protected $templating;
    protected $formFactory;
    protected $requestStack;
    protected $urlGenerator;

    /**
     * Set up the test
     */
    public function setUp()
    {
        $this->formFactory = Phake::mock('Symfony\Component\Form\FormFactory');
        $this->requestStack = Phake::mock('Symfony\Component\HttpFoundation\RequestStack');
        $this->urlGenerator = Phake::mock('Symfony\Component\Routing\Generator\UrlGeneratorInterface');
        $this->factory = Phake::mock('OpenOrchestra\Newsletter\Factory\NewsletterSubscriberFactory');

        $this->templating = Phake::mock('Symfony\Bundle\FrameworkBundle\Templating\EngineInterface');
        $manager = Phake::mock('OpenOrchestra\DisplayBundle\DisplayBlock\DisplayBlockManager');
        Phake::when($manager)->getTemplating()->thenReturn($this->templating);

        $this->block = Phake::mock('OpenOrchestra\ModelInterface\Model\BlockInterface');

        $this->strategy = new NewsletterStrategy($this->formFactory, $this->requestStack, $this->urlGenerator, $this->factory);
        $this->strategy->setManager($manager);
    }

    /**
     * Test instance
     */
    public function testInstance()
    {
        $this->assertInstanceOf('OpenOrchestra\DisplayBundle\DisplayBlock\DisplayBlockInterface', $this->strategy);
    }

    /**
     * Test name
     */
    public function testName()
    {
        $this->assertSame('newsletter', $this->strategy->getName());
    }

    /**
     * @param bool   $support
     * @param string $component
     *
     * @dataProvider provideComponentAndSupport
     */
    public function testSupport($support, $component)
    {
        Phake::when($this->block)->getComponent()->thenReturn($component);

        $this->assertSame($support, $this->strategy->support($this->block));
    }

    /**
     * @return array
     */
    public function provideComponentAndSupport()
    {
        return array(
            array(false, 'foo'),
            array(false, ContactStrategy::CONTACT),
            array(false, TinyMCEWysiwygStrategy::TINYMCEWYSIWYG),
            array(true, NewsletterStrategy::NEWSLETTER),
        );
    }
}
