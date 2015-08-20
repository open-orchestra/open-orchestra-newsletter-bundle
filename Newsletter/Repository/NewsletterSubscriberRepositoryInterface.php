<?php

namespace OpenOrchestra\Newsletter\Repository;

use OpenOrchestra\Pagination\Configuration\PaginateFinderConfiguration;

/**
 * Interface NewsletterSubscriberRepositoryInterface
 */
interface NewsletterSubscriberRepositoryInterface
{
    /**
     * Get all subscribers in paginate mode
     *
     * @param PaginateFinderConfiguration $configuration
     *
     * @return array
     */
    public function findAllForPaginate(PaginateFinderConfiguration $configuration);

    /**
     * Count all subscribers
     *
     * @return int
     */
    public function countAll();

    /**
     * Count all subscribers matching $configuration
     *
     * @param PaginateFinderConfiguration $configuration
     *
     * @return int
     */
    public function countAllWithFilters(PaginateFinderConfiguration $configuration);
}
