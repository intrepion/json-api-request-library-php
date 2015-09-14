<?php

namespace Intrepion\JsonApi\Request\Tests\HttpVerbs;

use Intrepion\JsonApi\Request\HttpVerbs\Put;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\HttpVerbs\Put
 */
class PutTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     */
    public function testSetAndGetResourceNameWithAString()
    {
        $jsonApi = new Put();
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
        $jsonApi = new Put();
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
        $jsonApi = new Put();
        $resourceName = 4;
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }
}
