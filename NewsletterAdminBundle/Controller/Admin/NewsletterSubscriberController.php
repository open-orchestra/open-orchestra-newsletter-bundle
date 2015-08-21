<?php

namespace OpenOrchestra\NewsletterAdminBundle\Controller\Admin;

use OpenOrchestra\BackofficeBundle\Controller\AbstractAdminController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class NewsletterSubscriberController
 *
 * @Config\Route("newsletter_subscriber")
 */
class NewsletterSubscriberController extends AbstractAdminController
{
    /**
     * @param Request $request
     *
     * @Config\Route("/new", name="open_orchestra_newsletter_subscriber_new")
     * @Config\Method({"GET", "POST"})
     *
     * @return Response
     */
    public function newAction(Request $request)
    {
        $newsletterSubscriber = $this->get('open_orchestra_newsletter.factory.newsletter_subscriber')->create();

        $form = $this->createForm('newsletter_subscriber', $newsletterSubscriber, array(
            'attr' => array('class' => 'new'),
            'action' => $this->generateUrl('open_orchestra_newsletter_subscriber_new'),
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        $message = $this->get('translator')->trans('open_orchestra_newsletter.form.newsletter_subscriber.new.success');

        if ($this->handleForm($form, $message, $newsletterSubscriber)) {
            return $this->render('BraincraftedBootstrapBundle::flash.html.twig');
        }

        return $this->renderAdminForm($form);
    }

    /**
     * @param Request $request
     * @param string  $newsletterSubscriberId
     *
     * @Config\Route("/form/{newsletterSubscriberId}", name="open_orchestra_newsletter_subscriber_form")
     * @Config\Method({"GET", "POST"})
     *
     * @return Response
     */
    public function formAction(Request $request, $newsletterSubscriberId)
    {
        $newsletterSubscriber = $this->get('open_orchestra_newsletter.repository.newsletter_subscriber')->find($newsletterSubscriberId);

        $form = $this->createForm('newsletter_subscriber', $newsletterSubscriber, array(
            'attr' => array('class' => 'new'),
            'action' => $this->generateUrl('open_orchestra_newsletter_subscriber_form', array('newsletterSubscriberId' => $newsletterSubscriberId)),
            'method' => 'POST',
        ));

        $form->handleRequest($request);
        $message = $this->get('translator')->trans('open_orchestra_newsletter.form.newsletter_subscriber.edit.success');

        if ($this->handleForm($form, $message, $newsletterSubscriber)) {
        }

        return $this->renderAdminForm($form);
    }
}
