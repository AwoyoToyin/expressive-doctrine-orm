<?php

/**
 * Description of PostService
 *
 * @author: Awoyo Oluwatoyin Stephen alias AwoyoToyin <awoyotoyin@gmail.com>
 */
namespace App\Service;

use Common\Service\AbstractService;

class PostService extends AbstractService
{
    /**
     * Serves the index of all entity
     *
     * @param array $filters
     * @param array $orderBy
     * @param array $groupBy
     * @return EntityInterface
     */
    public function index(
        array $filters = [],
        $orderBy = [],
        $groupBy = []
    ) {
        return parent::index($filters, $orderBy, $groupBy);
        // return $this->provider->selectAllPaginate(0, 1, $filters, $orderBy, $groupBy, false);
    }
}
