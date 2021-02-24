<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;

class DealsTest extends TestCase
{

    protected $deals;

    protected function setUp() :void 
    {
        $this->deals = new Deals();
    }

    protected function tearDown() :void 
    {
        $this->deals = null;
    }

    public function testGetDeals()
    {
        $response = $this->deals->all();

        $this->assertNotNull($response);
    }

}