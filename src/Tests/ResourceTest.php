<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\Resource;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\Resource
 * @covers ::__construct
 */
class ResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getName
     */
    public function testGetNameWithString()
    {
        $name = 'articles';
        $resource = new Resource($name);
        $this->assertEquals($name, $resource->getName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithNull()
    {
        $name = null;
        $resource = new Resource($name);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithInteger()
    {
        $name = 4;
        $resource = new Resource($name);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithEmptyString()
    {
        $name = '';
        $resource = new Resource($name);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithWhitespaceString()
    {
        $name = 'hello world';
        $resource = new Resource($name);
    }
}
