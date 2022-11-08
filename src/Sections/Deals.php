<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\DealsResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Deals extends App
{

    /**
     * Category constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
    }

    public function all(array $params){
        try {
            
            $response = $this->rest->post(StoreConstants::FIND_DEALS, $params);
            return (new DealsResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
