<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\Request;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\Request
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     */
    public function testSetAndGetResourceNameWithAString()
    {
        $jsonApi = new Request();
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
        $jsonApi = new Request();
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
        $jsonApi = new Request();
        $resourceName = 4;
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }
}
