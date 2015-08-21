<?php

namespace OpenOrchestra\NewsletterBundle\Tests\Factory;

use OpenOrchestra\Newsletter\Factory\NewsletterSubscriberFactory;
use Phake;

/**
 * Test NewsletterSubscriberFactoryTest
 */
class NewsletterSubscriberFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NewsletterSubscriberFactory
     */
    protected $factory;

    protected $class;
    protected $currentSiteManager;

    /**
     * Set up the test
     */
    public function setUp()
    {
        $this->currentSiteManager = Phake::mock('OpenOrchestra\BaseBundle\Context\CurrentSiteIdInterface');
        $this->class = 'OpenOrchestra\NewsletterModelBundle\Document\NewsletterSubscriber';

        $this->factory = new NewsletterSubscriberFactory($this->class, $this->currentSiteManager);
    }

    /**
     * @param string $siteId
     *
     * @dataProvider provideSiteId
     */
    public function testCreate($siteId)
    {
        Phake::when($this->currentSiteManager)->getCurrentSiteId()->thenReturn($siteId);

        $newsletterSubscriber = $this->factory->create();
        $this->assertInstanceOf('OpenOrchestra\Newsletter\Model\NewsletterSubscriberInterface', $newsletterSubscriber);
        $this->assertSame($siteId, $newsletterSubscriber->getSiteId());
    }

    /**
     * @return array
     */
    public function provideSiteId()
    {
        return array(
            array('1'),
            array('2'),
        );
    }
}
