<?php

namespace OpenOrchestra\NewsletterBundle\Tests\Form\Type;

use OpenOrchestra\NewsletterBundle\Form\Type\NewsletterSubscriberType;
use Phake;

/**
 * Test NewsletterSubscriberTypeTest
 */
class NewsletterSubscriberTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NewsletterSubscriberType
     */
    protected $type;

    protected $dataClass = 'stdClass';

    /**
     * Set up the test
     */
    public function setUp()
    {
        $this->type = new NewsletterSubscriberType($this->dataClass);
    }

    /**
     * Test instance
     */
    public function testInstance()
    {
        $this->assertInstanceOf('Symfony\Component\Form\FormTypeInterface', $this->type);
    }

    /**
     * Test name
     */
    public function testName()
    {
        $this->assertSame('newsletter_subscriber', $this->type->getName());
    }

    /**
     * Test defaults
     */
    public function testConfigureOptions()
    {
        $resolver = Phake::mock('Symfony\Component\OptionsResolver\OptionsResolver');

        $this->type->configureOptions($resolver);

        Phake::verify($resolver)->setDefaults(array(
            'data_class' => $this->dataClass,
        ));
    }

    /**
     * Test build form
     */
    public function testBuildForm()
    {
        $builder = Phake::mock('Symfony\Component\Form\FormBuilderInterface');

        $this->type->buildForm($builder, array());

        Phake::verify($builder, Phake::times(4))->add(Phake::anyParameters());
    }
}
