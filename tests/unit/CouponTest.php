<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;

class CouponTest extends TestCase
{

    protected $coupon;

    protected function setUp() :void 
    {
        $this->coupon = new Coupon();
    }

    protected function tearDown() :void 
    {
        $this->coupon = null;
    }

    public function testGetDeals()
    {
        $response = $this->coupon->all();

        $this->assertNotNull($response);
    }

}