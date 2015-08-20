<?php

namespace OpenOrchestra\Newsletter\DisplayBlock\Strategies;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\AbstractStrategy;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;
use OpenOrchestra\NewsletterBundle\Form\Type\NewsletterSubscriberType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class NewsletterStrategy
 */
class NewsletterStrategy extends AbstractStrategy
{
    const NEWSLETTER = 'newsletter';

    protected $formFactory;
    protected $requestStack;
    protected $urlGenerator;

    /**
     * @param FormFactory           $formFactory
     * @param RequestStack          $requestStack
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(FormFactory $formFactory, RequestStack $requestStack, UrlGeneratorInterface $urlGenerator)
    {
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * Check if the strategy support this block
     *
     * @param ReadBlockInterface $block
     *
     * @return boolean
     */
    public function support(ReadBlockInterface $block)
    {
        return self::NEWSLETTER == $block->getComponent();
    }

    /**
     * Perform the show action for a block
     *
     * @param ReadBlockInterface $block
     *
     * @return Response
     */
    public function show(ReadBlockInterface $block)
    {
        $request = $this->requestStack->getCurrentRequest();
        $routeName = $request->query->get('currentRouteName');

        $form = $this->formFactory->create(new NewsletterSubscriberType(), null, array(
            'action' => $this->urlGenerator->generate($routeName),
            'method' => 'POST',
        ));

        $sendData = $request->query->get('newsletter_subscriber');
        if (is_array($sendData)) {
            $form->submit($sendData);

            if ($form->isValid()) {
                var_dump($form->getData());
            }
        }

        return $this->render('OpenOrchestraNewsletterBundle:DisplayBlock/Newsletter:show.html.twig', array(
            'id' => $block->getId(),
            'class' => $block->getClass(),
            'form' => $form->createView(),
        ));
    }

    /**
     * Get the name of the strategy
     *
     * @return string
     */
    public function getName()
    {
        return 'newsletter';
    }
}
