<?php

namespace Phynixmedia\Store\Core;

class StoreConstants
{

    /**
     * Endpoint Constants
     */
    const API_BASE_URL          = 'https://rms.api.feramy.com';
    const API_LOCAL_BASE_URL    = 'http://localhost:8000';
    const API_END_POINT         = '/api';
    const API_OAUTH2_POINT      = '/oauth/token';
    const TEST_MODE             = true;

    public static function getHost(){

        // if(in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', "::1"])){
        //     return StoreConstants::API_LOCAL_BASE_URL;
        // }
        return StoreConstants::API_BASE_URL;
    }

    /**
     * Class constants
     */
    const PRODUCTS_BRIDGE   = 'products';
    const CATEGORY_BRIDGE   = 'category';
    const CUSTOMERS_BRIDGE  = 'customers';
    const DEALS_BRIDGE      = 'deals';
    const ORDERS_BRIDGE     = 'orders';
    const COUPONS_BRIDGE    = 'coupons';
    const VOUCHER_BRIDGE    = 'vouchers';

    /**
     * PRODUCTS ENDPOINTS
     */
    const GET_ALL_PRODUCTS                  = StoreConstants::API_END_POINT . '/store/list/products';
    const GET_SINGLE_PRODUCT                = StoreConstants::API_END_POINT . '/store/fetch/products';
    const FIND_PRODUCTS                     = StoreConstants::API_END_POINT . '/store/fetch/products';


    /**
     * CATEGORY ENDPOINTS
     */
    const GET_ALL_CATEGORY              = StoreConstants::API_END_POINT . '/store/list/category';
    const GET_SINGLE_CATEGORY           = StoreConstants::API_END_POINT . '/store/fetch/category';

    /**
     * ORDER ENDPOINTS
     */
    const UPDATE_CUSTOMER_ORDER     =   StoreConstants::API_END_POINT . '/customers/update/order';
    const GET_USER_ORDERS           =   StoreConstants::API_END_POINT . '/customers/find/order';
    const CREATE_ORDER              =   StoreConstants::API_END_POINT . '/customers/create/order';

    /**
     * CUSTOMER
     */
    const CREATE_CUSTOMER               = StoreConstants::API_END_POINT . '/customers/create/customer';
    const CREATE_CUSTOMER_ADDRESS       = StoreConstants::API_END_POINT . '/customers/create/contact';
    const FIND_CUSTOMER                  = StoreConstants::API_END_POINT . '/customers/find/customer';

    /**
     * COUPONS
     */
    const FIND_COUPONS                   = StoreConstants::API_END_POINT . '/promo/find/coupon';
    const FIND_DEALS                     = StoreConstants::API_END_POINT . '/promo/find/deals';
    const GET_USER_VOUCHER_HISTORY       = StoreConstants::API_END_POINT . '/promo/list/voucher';

    /**
     * VOUCHERS
     */
    const GET_USER_POINTS                = StoreConstants::API_END_POINT . '/rewards/find/points';
    const CONVERT_USER_POINTS            = StoreConstants::API_END_POINT . '/rewards/convert/points';
    

    /**
     * EXCEPTIONS
     */
    const UNEXPECTED_JSON_STRUCTURE_ERROR   = 'Unexpected JSON value or JSON structure';
    const UNEXPECTED_STATUS_CODE_ERROR      = 'Unexpected Resonse Status Code';
    const UNABLE_TO_PLACE_ORDER_ERROR       = 'Unable To Place Order Exception';
    const STORE_UNABLE_TO_CONNECT_EXCEPTION = 'Store Unable to connect Exception';
}
