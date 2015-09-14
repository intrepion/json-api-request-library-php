<?php

namespace Intrepion\JsonApi\Request\Tests\HttpVerbs;

use Intrepion\JsonApi\Request\HttpVerbs\Delete;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\HttpVerbs\Delete
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getResourceName
     * @covers ::setResourceName
     */
    public function testSetAndGetResourceNameWithAString()
    {
        $jsonApi = new Delete();
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
        $jsonApi = new Delete();
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
        $jsonApi = new Delete();
        $resourceName = 4;
        $jsonApi->setResourceName($resourceName);
        $this->assertEquals($resourceName, $jsonApi->getResourceName());
    }
}
