<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;
use Phynixmedia\Store\Core\StoreConstants;

class StoreTest extends TestCase
{

    protected $store;
    protected $params;
    protected $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MmI1OGI4Zi00OTQzLTRhOWMtYmI0Yi1iYjRiNDFlYzZmYmQiLCJqdGkiOiI3ZTFhZmRkZWZlNzczMmE4MDk4YTg4ZmQxYmE5ODJkOTg0ODcyMzk5Mjk3YjY5ZDAyNTU3MGZjMDI1NDZmNjAwYjk5ODNlMjUyYjk5NWRlNiIsImlhdCI6MTYxNDIxNjc4MCwibmJmIjoxNjE0MjE2NzgwLCJleHAiOjE2MTQ2NDg3ODAsInN1YiI6IiIsInNjb3BlcyI6W119.PsW9rwwFQhhKRBkUGWkDPHm6HEg8P3VB8fqDn6RiKbqHSxL84oMx5R96LGhxdEqA4mAujj1znktF0xWZeHUvy2Eqlp4dLdQ0did9EYMSzougDfboCFoMN9oNAG8bYbQf5UnvbXRzfodNa0Omp2Ugz847_iGZEzzz6QPzzVkgjBTag1Bc9dWhqMyY5n_VlOhYPsVlzY-A_Zs0TK3tUcd8FJlPQM8F65r6fY4bxqv8JlRXO6bZhjTuTQQlsYmSRlBae3kDlvdAytLG6C03XLUlx1DfH49kgYDKiBqn2XMsFdL3gbc2R8cxxYcK4KkTwirXjdZb4eVqG9D7gfyFC1XBB8AlGJigCe7m6fHViKRQlEP0Ocwm38SdTrpc_gmstsJ98qTHKBRoNiFQY5CbGZzsIL2lScUi7cHjTWm76G6-nI0dhRRLG2ry1z5c0bQZumT9b0bVXn1CxGrs7TomTmI0WlltWU5nUnTRGZBrSsbIbNfhMa1ZL-8DDJBvRKozD7uSU1vVn96Fd5LaDqj124Om7Ch-_6rkPPaFwVLtEyQi3_37MkLVLG2pwUMJU_SzyaPR014oqbgw_bmVr70xYsipG4GjSs6opvqTbywV7qf6hkbECPeC8l3UHfwvu1Czm0ug3egogj_aBb7CCf_Z3wpFLdijy6PQKILEThQMMJByJVo';

    protected function setUp() :void
    {
        $this->params = [
            'publish'   => '92b58b8f-4943-4a9c-bb4b-bb4b41ec6fbd',
            'secret'    => 'k8Rz59sC3JGiMYBG3lAZd0ADaWFoCM7s6UZOdjO7'
        ];
        $this->store = new Store();
    }

    protected function tearDown() :void
    {
        $this->store = null;
    }

//    public function testGetConfig()
//    {
//        $response = $this->store::config($this->params);
//
//        $this->assertNotNull($response);
//
//        $this->assertNotNull($response->getToken());
//
////        var_dump($response->getToken());
//    }

    public function testRequestProducts(){

        $products = $this->store->load($this->token, StoreConstants::PRODUCTS_BRIDGE);
        $response = $products->all([
            'companyid'     => 1,
            'outletid'      => 0 // optional
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }



}
