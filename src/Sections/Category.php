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

    public function all(array $params)
    {
        try {
            $response = $this->rest->post(StoreConstants::GET_ALL_CATEGORY, $params);
            // var_dump($response);
            return (new CategoryResponseParser($response))->getResponse();
        } catch (\Exception $e) {

            // var_dump($e->getMessage());
            return $e->getMessage();
        }
    }

    public function getProducts(array $params)
    {
        try {

            $response = $this->rest->post(StoreConstants::GET_PRODUCTS_BY_CATEGORY, $params);
            return (new CategoryResponseParser($response))->getResponse();
        } catch (\Exception $e) {

            // var_dump($e->getMessage());
            return $e->getMessage();
        }
    }

}
