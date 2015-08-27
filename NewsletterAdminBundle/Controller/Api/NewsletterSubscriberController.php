<?php

namespace OpenOrchestra\NewsletterAdminBundle\Controller\Api;

use OpenOrchestra\ApiBundle\Controller\ControllerTrait\HandleRequestDataTable;
use OpenOrchestra\BaseApi\Facade\FacadeInterface;
use OpenOrchestra\BaseApiBundle\Controller\Annotation as Api;
use OpenOrchestra\Newsletter\Event\NewsletterSubscriberEvent;
use OpenOrchestra\NewsletterBundle\NewsletterSuscriberEvents;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Config;
use OpenOrchestra\BaseApiBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NewsletterSubscriberController
 *
 * @Config\Route("newsletter_subscriber")
 *
 * @Api\Serialize()
 */
class NewsletterSubscriberController extends BaseController
{
    use HandleRequestDataTable;

    /**
     * @param int $newsletterSubscriberId
     *
     * @Config\Route("/{newsletterSubscriberId}", name="open_orchestra_api_newsletter_subscriber_show")
     * @Config\Method({"GET"})
     *
     * @return FacadeInterface
     */
    public function showAction($newsletterSubscriberId)
    {
        $newsletterSubscriber = $this->get('open_orchestra_newsletter.repository.newsletter_subscriber')->find($newsletterSubscriberId);

        return $this->get('open_orchestra_api.transformer_manager')->get('newsletter_subscriber')->transform($newsletterSubscriber);
    }

    /**
     * @param Request $request
     *
     * @Config\Route("", name="open_orchestra_api_newsletter_subscriber_list")
     * @Config\Method({"GET"})
     *
     * @return FacadeInterface
     */
    public function listAction(Request $request)
    {
        $mapping = $this
            ->get('open_orchestra_base.annotation_search_reader')
            ->extractMapping($this->container->getParameter('open_orchestra_newsletter.document.newsletter_subscriber.class'));
        $repository = $this->get('open_orchestra_newsletter.repository.newsletter_subscriber');
        $collectionTransformer = $this->get('open_orchestra_api.transformer_manager')->get('newsletter_subscriber_collection');

        return $this->handleRequestDataTable($request, $repository, $mapping, $collectionTransformer);
    }

    /**
     * @param int $newsletterSubscriberId
     *
     * @Config\Route("/{newsletterSubscriberId}/delete", name="open_orchestra_api_newsletter_subscriber_delete")
     * @Config\Method({"DELETE"})
     *
     * @return Response
     */
    public function deleteAction($newsletterSubscriberId)
    {
        $newsletterSubscriber = $this->get('open_orchestra_newsletter.repository.newsletter_subscriber')->find($newsletterSubscriberId);
        $dm = $this->get('object_manager');
        $dm->remove($newsletterSubscriber);
        $this->dispatchEvent(NewsletterSuscriberEvents::DELETE, new NewsletterSubscriberEvent($newsletterSubscriber));
        $dm->flush();

        return array();
    }
}
