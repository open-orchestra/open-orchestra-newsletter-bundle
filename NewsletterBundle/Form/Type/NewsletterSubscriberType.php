<?php

namespace OpenOrchestra\NewsletterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class NewsletterSubscriberType
 */
class NewsletterSubscriberType extends AbstractType
{
    protected $dataClass;

    /**
     * @param string $dataClass
     */
    public function __construct($dataClass)
    {
        $this->dataClass = $dataClass;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text', array(
            'label' => 'open_orchestra_newsletter.form.first_name'
        ));
        $builder->add('lastName', 'text', array(
            'label' => 'open_orchestra_newsletter.form.last_name'
        ));
        $builder->add('email', 'email', array(
            'label' => 'open_orchestra_newsletter.form.email',
        ));
        $builder->add('submit', 'submit', array(
            'label' => 'open_orchestra_base.form.submit',
            'attr' => array(
                'class' => 'submit_form'
            )
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'newsletter_subscriber';
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options.
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->dataClass,
        ));
    }
}
