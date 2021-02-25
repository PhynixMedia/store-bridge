## Run Unit testing

> 1. sudo composer test
> 2. vendor/phpunit/phpunit tests/unit/MainTest.php
> 3. sudo vendor/bin/phpunit tests/unit/*.php


##### ================= CONFIGURATION =======================


> Access token end point: 
```
http://localhost:8000/oauth/token 
```

> Demo Credential:
```
        FERAMY_PUBLISH = '92b58b8f-4943-4a9c-bb4b-bb4b41ec6fbd',
        FERAMY_SECRET = 'k8Rz59sC3JGiMYBG3lAZd0ADaWFoCM7s6UZOdjO7'
```


> Usage: 
```

Import:
use Phynixmedia\Store\Store;

Initialize the config:

$response = Store::config([
    'publish'   => FERAMY_PUBLISH,
    'secret'    => FERAMY_SECRET
]);

$response->access_token
$response->token_type
$response->expires_at
....

This uses by default client_credentials grant type

```

> To Load a product section or category etc
```
$products = Store::load($this->token, StoreConstants::PRODUCTS_BRIDGE);
$response = $products->all([
     'companyid'     => 1,
     'outletid'      => 0 // optional -> only use if you want to pull products by outlet
]);

var_dump($response);

```

>  Endpoint base
```
http://localhost:8000/api/v4
```

> List of Loadable Sections
```
     /**
     * Class constants
     */
     const PRODUCTS_BRIDGE   = 'products';
     const CATEGORY_BRIDGE   = 'category';
     const CUSTOMERS_BRIDGE  = 'customers';
     const DEALS_BRIDGE      = 'deals';
     const ORDERS_BRIDGE     = 'orders';
     const COUPONS_BRIDGE    = 'coupons';

```

> Sections: Products
```

All:
$response = $response = $products->all([
     'companyid'     => 1,
     'outletid'      => 0 // optional -> only use if you want to pull products by outlet
]);

Single Product:
$response = $response = $products->get([
     'companyid'     => 1,
     'outletid'      => 0, // optional
     'productid'     => 1 
]);

Search Products:
$response = $this->products->search([
      'companyid'         => 1,
      'outletid'          => 0,
      'search'            => 1
]);



```

> Sections: Category
```

All Sorted Categories:
$response = $this->category->all([
            'companyid'     => 1,
            "outletid"    => 1,
            "sorted"      => 0
            ]);

All Categories:

$response = $this->category->all([
            'companyid'     => 1,
            "outletid"    => 1
            ]);

Products in Category:
$response =  $this->category->getProducts([
            'companyid'     => 1,
            "categoryid"    => 1,
            "outletid"      => 0
            ]);

```

> Sections: Customer
```
Create Customer:

$response = $this->customer->create([
            "namex"         => "David Adebayo",
            "company_id"    => "1",
            "email"         => "david4real_chris@yahoo.org", 
            "password"      => "@david4Real"
        ]);

Save Customer Address:

$response = $this->customer->saveAddress([
            "company_id"    => "1",
            "customer_id"   => "1",
            "names"         => "Adebaol Joel",
            "city"          => "London",
            "address_1"     => "Joel Meth, Avenue, London",
            "address_2"     => "King, Street London",
            "country"       => "United Kingdom",
            "phone"         => "+4489786756",
            "postcode"      => "FK70BU"
       ]);

Customer Login:

$response = $this->customer->auth([
            "email"     => "david4real_chris@yahoo.net", 
            "password"  => "@david4Real"
        ]);

Customer Reset Password: (Not Complete)

$response = $this->customer->reset([
            "email"     => "david4real_chris@yahoo.net", 
        ]);

```

> Sections: Orders
```

Create Customer Order:

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

Get Multiple Orders for a Customer:

$response = $this->order->getMany([
            'companyid'          => 1,
            'customerid'         => 1,
        ]);

Get A single Order:

$response = $this->order->getOne([
            'companyid'          => 1,
            'customerid'         => 1,
            'orderid'            => 23
        ]);

Search Orders:

$response = $this->order->search([
            'companyid'          => '1',
            'order_code'         => '8748cc648cee597',
        ]);

```

> Sections: Deals
```

```

> Sections: Coupon
```

```

