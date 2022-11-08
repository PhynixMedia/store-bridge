<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\CategoryResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Category extends App
{

    /**
     * Category constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
    }

    public function all(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_ALL_CATEGORY, $params, $pager);
            return (new CategoryResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function get(array $params, int $pager = 0)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_SINGLE_CATEGORY, $params, $pager);
            return (new CategoryResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
