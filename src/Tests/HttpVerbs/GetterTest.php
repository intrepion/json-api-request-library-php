<?php

namespace Intrepion\JsonApi\Request\Tests\HttpVerbs;

use Intrepion\JsonApi\Request\HttpVerbs\Getter;
use Intrepion\JsonApi\Request\Resource;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\HttpVerbs\Getter
 * @covers ::__construct
 */
class GetterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::generateUri
     */
    public function testGenerateUriWithResource()
    {
        $resource = new Resource('articles');
        $getter = new Getter($resource);
        $url = '/articles';
        $this->assertEquals($url, $getter->generateUri());
    }

    /**
     * @covers ::addInclude
     * @covers ::generateUri
     */
    public function testAddIncludeWithResource()
    {
        $resource = new Resource('articles');
        $jsonApi = new Getter($resource);
        $includes = array('author');
        foreach($includes as $include) {
            $resource = new Resource($include);
            $jsonApi->addInclude($resource);
        }
        $uri = '/articles?include=author';
        $this->assertEquals($uri, $jsonApi->generateUri());
    }
}
