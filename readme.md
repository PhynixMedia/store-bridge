## Run Unit testing

> 1. sudo composer test
> 2. vendor/phpunit/phpunit tests/unit/MainTest.php
> 3. sudo vendor/bin/phpunit tests/unit/*.php


##### ================= CONFIGURATION =======================


> Access token end point: 
```
localhost:8000/oauth/token 
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