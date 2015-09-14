<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\Get;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\Get
 */
class GetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     */
    public function testSetAndGetResourceNameWithAString()
    {
        $jsonApi = new Get();
        $resourceName = 'articles';
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }

    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     * @expectedException \InvalidArgumentException
     */
    public function testSetAndGetResourceNameWithANull()
    {
        $jsonApi = new Get();
        $resourceName = null;
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }

    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     * @expectedException \InvalidArgumentException
     */
    public function testSetAndGetResourceNameWithAnInteger()
    {
        $jsonApi = new Get();
        $resourceName = 4;
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }
}
