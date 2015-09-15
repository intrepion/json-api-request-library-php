<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\Field;
use Intrepion\JsonApi\Request\Sort;
use Intrepion\JsonApi\Request\Resource;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\Sort
 * @covers ::__construct
 */
class SortTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getAscending
     */
    public function testGetAscendingWithBoolean()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $fieldName = 'title';
        $field = new Field($fieldName, $resource);
        $ascending = false;
        $sort = new Sort($field, $ascending);
        $this->assertEquals($ascending, $sort->getAscending());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetAscendingWithNull()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $fieldName = 'title';
        $field = new Field($fieldName, $resource);
        $ascending = null;
        $sort = new Sort($field, $ascending);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetAscendingWithInteger()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $fieldName = 'title';
        $field = new Field($fieldName, $resource);
        $ascending = 4;
        $sort = new Sort($field, $ascending);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetAscendingWithString()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $fieldName = 'title';
        $field = new Field($fieldName, $resource);
        $ascending = 'false';
        $sort = new Sort($field, $ascending);
    }

    /**
     * @covers ::getField
     */
    public function testGetFieldWithField()
    {
        $resourceName = 'articles';
        $resource = new Resource($resourceName);
        $fieldName = 'title';
        $field = new Field($fieldName, $resource);
        $ascending = true;
        $sort = new Sort($field, $ascending);
        $this->assertEquals($field, $sort->getField());
    }
}
