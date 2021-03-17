<?php

namespace Phynixmedia\Store\Sections;

use Phynixmedia\Store\Core\App;
use Phynixmedia\Store\Core\StoreConstants;
use Phynixmedia\Store\Responses\Parsers\VoucherResponseParser;

/**
 * Class Category
 * @package Phynixmedia\Store
 */
class Vouchers extends App
{

    /**
     * Category constructor.
     */
    public function __construct(string $authorizer)
    {
        parent::__construct( $authorizer);
    }

    public function convert(array $params){
        try {
            
            $response = $this->rest->post(StoreConstants::CONVERT_POINTS, $params);
            return (new VoucherResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function history(array $params){
        try {
            
            $response = $this->rest->post(StoreConstants::GET_VOUCHER_HISTORY, $params);
            return (new VoucherResponseParser($response))->getResponse();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
