<?php

namespace Intrepion\JsonApi\Request\Tests\HttpVerbs;

use Intrepion\JsonApi\Request\HttpVerbs\Getter;
use Intrepion\JsonApi\Request\Field;
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
    public function testAddIncludeWithOneResource()
    {
        $resource = new Resource('articles');
        $jsonApi = new Getter($resource);
        $includes = array(
            'author' => 'people',
        );
        foreach($includes as $associationName => $resourceName) {
            $resource = new Resource($resourceName);
            $jsonApi->addInclude($associationName, $resource);
        }
        $uri = '/articles?include=author';
        $this->assertEquals($uri, $jsonApi->generateUri());
    }

    /**
     * @covers ::addInclude
     * @covers ::generateUri
     */
    public function testAddIncludeWithManyResource()
    {
        $resource = new Resource('articles');
        $jsonApi = new Getter($resource);
        $includes = array(
            'author' => 'people',
            'tag' => 'tags',
        );
        foreach($includes as $associationName => $resourceName) {
            $resource = new Resource($associationName, $resourceName);
            $jsonApi->addInclude($associationName, $resource);
        }
        $uri = '/articles?include=author,tag';
        $this->assertEquals($uri, $jsonApi->generateUri());
    }
}
