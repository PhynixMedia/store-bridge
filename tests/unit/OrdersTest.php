<?php

namespace Phynixmedia\Store;

use Phynixmedia\Store\Requests\OrderRequest;
use Phynixmedia\Store\Requests\OrderItemRequest;
use Phynixmedia\Store\Requests\CustomerRequest;
use Phynixmedia\Store\Requests\CustomerContactRequest;

use PHPUnit\Framework\TestCase;

class OrdersTest extends TestCase
{

    protected $order;
    protected $request;

    protected function setUp() :void 
    {
        $this->order = new Orders();

    }

    protected function tearDown() :void 
    {
        $this->order = null;
    }

    public function testPlaceOrder()
    {
        $response = $this->order->place([
            'companyid'          => '1',
            'customerid'         => '1',
            'outletid'           => '1',
            'delivery_charge'    => '10.99',
            'comment'            => 'nill',
            'discount'           => '0.00',
            'shipped_date'       => '2021-09-06',
            'cart_checkout'      => [
                [
                    'products_id'   => 1,
                    'size_id'       => 1,
                    'quantity'      => 4,
                    'deal_id'       => 0,
                    'unit'          => '',
                    'price'         => 3.99
                ],[
                    'products_id'   => 1,
                    'size_id'       => 1,
                    'quantity'      => 4,
                    'deal_id'       => 0,
                    'unit'          => '',
                    'price'         => 3.99
                ],[
                    'products_id'   => 1,
                    'size_id'       => 1,
                    'quantity'      => 4,
                    'deal_id'       => 0,
                    'unit'          => '',
                    'price'         => 3.99
                ]
            ],
        ]);

        $this->assertNotNull($response);

        var_dump($response);

    }

    public function testGetOrders()
    {
        $response = $this->order->getMany([
            'companyid'          => 1,
            'customerid'         => 1,
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }

    public function testGetOrder()
    {
        $response = $this->order->getOne([
            'companyid'          => 1,
            'customerid'         => 1,
            'orderid'            => 23
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }

    public function testSearchOrder()
    {
        $response = $this->order->search([
            'companyid'          => '1',
            'order_code'         => '8748cc648cee597',
        ]);

        $this->assertNotNull($response);

        var_dump($response);
    }
}