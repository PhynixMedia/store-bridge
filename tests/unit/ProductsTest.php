<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;

class ProductsTest extends TestCase
{

    protected $products;

    protected function setUp(): void
    {
        $this->products = new Products();

    }

    protected function tearDown(): void
    {
        $this->products = null;
    }

    public function testGetProducts()
    {
        $response = $this->products->all([
            'companyid'     => 1,
            'outletid'      => 0 // optional
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }

    public function testGetProduct()
    {
        $response = $this->products->get([
            'companyid'     => 1,
            'outletid'      => 0, // optional
            'productid'     => 1 
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }

    public function testSearchProduct()
    {
        $response = $this->products->search([
            'companyid'         => 1,
            'outletid'          => 0,
            'search'            => 1
        ]);

        $this->assertNotNull($response);
    }

}