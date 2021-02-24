<?php

namespace Phynixmedia\Store;

use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{

    protected $category;

    protected function setUp() :void
    {
        $this->category = new Category();
    }

    protected function tearDown() :void
    {
        $this->category = null;
    }

    public function testGetAllSortedCategory()
    {
        $response = $this->category->all([
            'companyid'     => 1,
            "outletid"    => 1,
            "sorted"      => 0
            ]);
        $this->assertNotNull($response);

        var_dump($response);

    }

    public function testGetAllCategory()
    {
        $response = $this->category->all([
            'companyid'     => 1,
            "outletid"    => 1,
            "sorted"      => 0
            ]);
        $this->assertNotNull($response);

        var_dump($response);

    }

    public function testGetCategory()
    {
        $response = $this->category->getProducts([
            'companyid'     => 1,
            "categoryid"    => 1,
            "outletid"      => 0
            ]);

        $this->assertNotNull($response);

        var_dump($response);
    }

}