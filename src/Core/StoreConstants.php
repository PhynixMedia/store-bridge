<?php

namespace Phynixmedia\Store\Core;

class StoreConstants
{

    /**
     * Endpoint Constants
     */
    //    const API_END_POINT = 'https://app.feramy.com/api/v4';
    const API_BASE_URL = 'http://localhost:8000';
    const API_END_POINT = '/api/v4';
    const API_OAUTH2_POINT = '/oauth/token';
    const TEST_MODE     = true;

    /**
     * Class constants
     */
    const PRODUCTS_BRIDGE   = 'products';
    const CATEGORY_BRIDGE   = 'category';
    const CUSTOMERS_BRIDGE  = 'customers';
    const DEALS_BRIDGE      = 'deals';
    const ORDERS_BRIDGE     = 'orders';
    const COUPONS_BRIDGE    = 'coupons';

    /**
     * PRODUCTS ENDPOINTS
     */
    const GET_ALL_PRODUCTS                  = StoreConstants::API_END_POINT . '/products/list';  // companyid,
    const GET_SINGLE_PRODUCT                = StoreConstants::API_END_POINT . '/products/get'; // companyid, productid, outletid?
    const SEARCH_PRODUCTS                   = StoreConstants::API_END_POINT . '/products/search'; // missing

    /**
     * CATEGORY ENDPOINTS
     */
    const GET_ALL_CATEGORY          = StoreConstants::API_END_POINT . '/products/category/list';
    const GET_PRODUCTS_BY_CATEGORY  = StoreConstants::API_END_POINT . '/products/category/list/items';

    /**
     * CUSTOMER
     */

    const AUTH_USER_LOGIN               = StoreConstants::API_END_POINT . '/customers/auth/login';
    const CREATE_CUSTOMER               = StoreConstants::API_END_POINT . '/customers/create/account';
    const CREATE_CUSTOMER_ADDRESS       = StoreConstants::API_END_POINT . '/customers/create/address';
    const RESET_CUSTOMER_PASSWORD       = StoreConstants::API_END_POINT . '/customers/reset/password';

    /**
     * ORDER ENDPOINTS
     */
    const PLACE_ORDER       =   StoreConstants::API_END_POINT . '/orders/create';
    const SEARCH_ORDERS     =   StoreConstants::API_END_POINT . '/orders/search';
    const GET_USER_ORDERS   =   StoreConstants::API_END_POINT . '/orders/list';
    const GET_USER_ORDER    =  StoreConstants::API_END_POINT . '/orders/get';

    /**
     * COUPONS
     */
    const GET_COUPONS     = StoreConstants::API_END_POINT . '/coupons/available';

    /**
     * DEALS
     */
    const GET_DEALS     = StoreConstants::API_END_POINT . '/deals/available';

    /**
     * EXCEPTIONS
     */
    const UNEXPECTED_JSON_STRUCTURE_ERROR   = 'Unexpected JSON value or JSON structure';
    const UNEXPECTED_STATUS_CODE_ERROR      = 'Unexpected Resonse Status Code';
    const UNABLE_TO_PLACE_ORDER_ERROR       = 'Unable To Place Order Exception';
    const STORE_UNABLE_TO_CONNECT_EXCEPTION = 'Store Unable to connect Exception';
}
