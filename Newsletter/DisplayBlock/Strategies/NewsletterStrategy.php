<?php

namespace OpenOrchestra\Newsletter\DisplayBlock\Strategies;

use Doctrine\Common\Persistence\ObjectManager;
use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\AbstractStrategy;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;
use OpenOrchestra\Newsletter\Factory\NewsletterSubscriberFactory;
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

    protected $factory;
    protected $formFactory;
    protected $requestStack;
    protected $urlGenerator;
    protected $objectManager;

    /**
     * @param FormFactory                 $formFactory
     * @param RequestStack                $requestStack
     * @param UrlGeneratorInterface       $urlGenerator
     * @param NewsletterSubscriberFactory $factory
     * @param ObjectManager               $objectManager
     */
    public function __construct(
        FormFactory $formFactory,
        RequestStack $requestStack,
        UrlGeneratorInterface $urlGenerator,
        NewsletterSubscriberFactory $factory,
        ObjectManager $objectManager
    )
    {
        $this->formFactory = $formFactory;
        $this->requestStack = $requestStack;
        $this->urlGenerator = $urlGenerator;
        $this->factory = $factory;
        $this->objectManager = $objectManager;
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
        $newsletterSubscriber = $this->factory->create();

        $form = $this->formFactory->create('newsletter_subscriber', $newsletterSubscriber, array(
            'action' => $this->urlGenerator->generate($routeName),
            'method' => 'POST',
        ));

        $sendData = $request->query->get('newsletter_subscriber');
        $confirmationMessage = null;
        if (is_array($sendData)) {
            $form->submit($sendData);

            if ($form->isValid()) {
                $confirmationMessage = 'open_orchestra_newsletter.registration.success';
                $this->objectManager->persist($newsletterSubscriber);
                $this->objectManager->flush($newsletterSubscriber);
            }
        }

        return $this->render('OpenOrchestraNewsletterBundle:DisplayBlock/Newsletter:show.html.twig', array(
            'id' => $block->getId(),
            'class' => $block->getClass(),
            'form' => $form->createView(),
            'confirmation_message' => $confirmationMessage,
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
