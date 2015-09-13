<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\RequestJson;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\RequestJson
 */
class RequestJsonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     */
    public function testSetAndGetResourceNameWithAString()
    {
        $jsonApi = new RequestJson();
        $resourceName = 'posts';
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
        $jsonApi = new RequestJson();
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
        $jsonApi = new RequestJson();
        $resourceName = 4;
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }
}
