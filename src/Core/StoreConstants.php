<?php

namespace Phynixmedia\Store\Core;

class StoreConstants
{

//    const API_END_POINT = 'https://app.feramy.com/api/v4';
    const API_END_POINT = 'http://localhost:8000/api/v4';
    const TEST_MODE     = true;


    /**
     * _param_0 = company id
     * _param_1 = outlet_id / customer id
     * _param_2 = item specific id
     */


    /**
     * PRODUCTS ENDPOINTS
     */
    const GET_ALL_PRODUCTS                  = '/products/list';  // companyid,
    const GET_SINGLE_PRODUCT                = '/products/get'; // companyid, productid, outletid?
    const SEARCH_PRODUCTS                   =   '/products/search'; // missing

    /**
     * CATEGORY ENDPOINTS
     */
    const GET_ALL_CATEGORY          = '/products/category/list';
    const GET_PRODUCTS_BY_CATEGORY  = '/products/category/list/items';

    /**
     * CUSTOMER
     */

    const AUTH_USER_LOGIN               = '/customers/auth/login';
    const CREATE_CUSTOMER               = '/customers/create/account';
    const CREATE_CUSTOMER_ADDRESS       = '/customers/create/address';
    const RESET_CUSTOMER_PASSWORD       = '/customers/reset/password';

    /**
     * ORDER ENDPOINTS
     */
    const PLACE_ORDER       =   '/orders/create';
    const SEARCH_ORDERS     =   '/orders/search';
    const GET_USER_ORDERS   =   '/orders/list'; 
    const GET_USER_ORDER    =   '/orders/get';

    /**
     * COUPONS
     */
    const GET_COUPONS     = '/coupons/available';

    /**
     * DEALS
     */
    const GET_DEALS     = '/deals/available';

    /**
     * EXCEPTIONS
     */
    const UNEXPECTED_JSON_STRUCTURE_ERROR   = 'Unexpected JSON value or JSON structure';
    const UNEXPECTED_STATUS_CODE_ERROR      = 'Unexpected Resonse Status Code';
    const UNABLE_TO_PLACE_ORDER_ERROR       = 'Unable To Place Order Exception';
    const STORE_UNABLE_TO_CONNECT_EXCEPTION = 'Store Unable to connect Exception';
}