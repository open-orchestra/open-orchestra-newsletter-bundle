<?php

namespace OpenOrchestra\NewsletterModelBundle\Repository;

use OpenOrchestra\Newsletter\Repository\NewsletterSubscriberRepositoryInterface;
use OpenOrchestra\Pagination\MongoTrait\PaginationTrait;
use OpenOrchestra\Repository\AbstractAggregateRepository;
use OpenOrchestra\Pagination\Configuration\PaginateFinderConfiguration;

/**
 * Class NewsletterSubscriberRepository
 */
class NewsletterSubscriberRepository extends AbstractAggregateRepository implements NewsletterSubscriberRepositoryInterface
{
    use PaginationTrait;

    /**
     * @param PaginateFinderConfiguration $configuration
     *
     * @return array
     */
    public function findAllForPaginate(PaginateFinderConfiguration $configuration)
    {
        $qa = $this->createAggregationQuery();
        $qa = $this->generateFilter($qa, $configuration);
        $qa = $this->generateFilterSort(
            $qa,
            $configuration->getOrder(),
            $configuration->getDescriptionEntity()
        );

        $qa = $this->generateSkipFilter($qa, $configuration->getSkip());
        $qa = $this->generateLimitFilter($qa, $configuration->getLimit());

        return $this->hydrateAggregateQuery($qa);
    }

    /**
     * @return int
     */
    public function countAll()
    {
        $qa = $this->createAggregationQuery();

        return $this->countDocumentAggregateQuery($qa);
    }

    /**
     * @param PaginateFinderConfiguration $configuration
     *
     * @return int
     */
    public function countAllWithFilters(PaginateFinderConfiguration $configuration)
    {
        $qa = $this->createAggregationQuery();
        $qa = $this->generateFilter($qa, $configuration);

        return $this->countDocumentAggregateQuery($qa);
    }
}
