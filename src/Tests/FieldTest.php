<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\Field;
use Intrepion\JsonApi\Request\Resource;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\Field
 * @covers ::__construct
 */
class FieldTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getName
     */
    public function testGetNameWithString()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $name = 'title';
        $field = new Field($name, $resource);
        $this->assertEquals($name, $field->getName());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithNull()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $name = null;
        $field = new Field($name, $resource);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithInteger()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $name = 4;
        $field = new Field($name, $resource);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithEmptyString()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $name = '';
        $field = new Field($name, $resource);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNameWithWhitespaceString()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $name = 'hello world';
        $field = new Field($name, $resource);
    }

    /**
     * @covers ::getResource
     */
    public function testGetResourceWithResource()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $name = 'title';
        $field = new Field($name, $resource);
        $this->assertEquals($resource, $field->getResource());
    }
}
