<?php

namespace Intrepion\JsonApi\Request\Tests;

use Intrepion\JsonApi\Request\Page;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\Page
 * @covers ::__construct
 */
class PageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getNumber
     */
    public function testGetNumberWithInteger()
    {
        $number = 4;
        $size = 4;
        $page = new Page($number, $size);
        $this->assertEquals($number, $page->getNumber());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNumberWithNull()
    {
        $number = null;
        $size = 4;
        $page = new Page($number, $size);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNumberWithString()
    {
        $number = '4';
        $size = 4;
        $page = new Page($number, $size);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNumberWithZero()
    {
        $number = 0;
        $size = 4;
        $page = new Page($number, $size);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetNumberWithNegative()
    {
        $number = -4;
        $size = 4;
        $page = new Page($number, $size);
    }

    /**
     * @covers ::getSize
     */
    public function testGetSizeWithInteger()
    {
        $number = 4;
        $size = 4;
        $page = new Page($number, $size);
        $this->assertEquals($number, $page->getSize());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetSizeWithNull()
    {
        $number = 4;
        $size = null;
        $page = new Page($number, $size);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetSizeWithString()
    {
        $number = 4;
        $size = '4';
        $page = new Page($number, $size);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetSizeWithZero()
    {
        $number = 4;
        $size = 0;
        $page = new Page($number, $size);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetSizeWithNegative()
    {
        $number = 4;
        $size = -4;
        $page = new Page($number, $size);
    }
}
