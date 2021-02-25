## Run Unit testing

> 1. sudo composer test
> 2. vendor/phpunit/phpunit tests/unit/MainTest.php
> 3. sudo vendor/bin/phpunit tests/unit/*.php


##### ================= CONFIGURATION =======================


> Access token end point: 
```
http://localhost:8000/oauth/token 
```


> Usage: 
```
Initialize the config:

$response = $this->store::config([
    'publish'   => '92b58b8f-4943-4a9c-bb4b-bb4b41ec6fbd',
    'secret'    => 'k8Rz59sC3JGiMYBG3lAZd0ADaWFoCM7s6UZOdjO7'
]);

$response->access_token
$response->token_type
$response->expires_at
....

This uses by default client_credentials grant type

```

> To Load a product section or category etc
```
$products = $this->store->load($this->token, StoreConstants::PRODUCTS_BRIDGE);
$response = $products->all([
     'companyid'     => 1,
     'outletid'      => 0 // optional -> only use if you want to pull products by outlet
]);

var_dump($response);

```

> Configuration Parameters
```
    1. CLIENT_ID=3
    2. CLIENT_SECRET=NwGuzZ4yKvAJ2jpzQPilFp6apbT5cr4S275B4DnP
    3. GRANT_TYPE=client_credentials
    4. SCOPE=*

{
   "grant_type": "client_credentials",
   "client_id": "3",
   "scope": "*",
   "client_secret": "NwGuzZ4yKvAJ2jpzQP4S275B4DnP"
}
```
>  Endpoint base
```
http://localhost:8000/api/v4
```

> List of Endpoints to call
```
    1. get products             /get/products
    2. get product by id        /get/product/{id}
    3. search products          /search/products
    4. get category             /get/category
    5. get category by id       /get/category/{id}
    6. get products by category /get/products/category/{id}
    7. place order              /place/order
    8. get orders               /get/order
    9. search orders            /search/orders
    10. get customers           /get/customer/{id}
    11. set customer            /customer/save

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

