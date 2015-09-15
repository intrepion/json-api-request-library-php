<?php

namespace Intrepion\JsonApi\Request\Tests\HttpVerbs;

use Intrepion\JsonApi\Request\HttpVerbs\Getter;
use Intrepion\JsonApi\Request\Field;
use Intrepion\JsonApi\Request\Page;
use Intrepion\JsonApi\Request\Resource;

/**
 * @coversDefaultClass \Intrepion\JsonApi\Request\HttpVerbs\Getter
 * @covers ::__construct
 */
class GetterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::generateUri
     * @covers ::generateIncludeText
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
     * @covers ::generateIncludeText
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
     * @covers ::generateIncludeText
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

    /**
     * @covers ::addInclude
     * @covers ::addField
     * @covers ::generateIncludeText
     * @covers ::generateFieldText
     * @covers ::generatePageText
     * @covers ::generateUri
     */
    public function testAddIncludeWithSpecificFields()
    {
        $resourceNames = array(
            'articles',
            'people',
        );
        $resources = array();
        foreach ($resourceNames as $resourceName) {
            $resources[$resourceName] = new Resource($resourceName);
        }
        $resourceFieldNames = array(
            'articles' => array('title', 'body', 'author'),
            'people' => array('name'),
        );
        $fields = array();
        foreach ($resourceFieldNames as $resourceName => $fieldNames) {
            foreach ($fieldNames as $fieldName) {
                $resource = $resources[$resourceName];
                $fields[$resourceName . '__' . $fieldName] = new Field($fieldName, $resource);
            }
        }
        $resource = $resources['articles'];
        $jsonApi = new Getter($resource);
        $includes = array(
            'author' => 'people',
        );
        foreach ($includes as $associationName => $resourceName) {
            $resource = $resources[$resourceName];
            $jsonApi->addInclude($associationName, $resource);
        }
        foreach ($resourceFieldNames as $resourceName => $fieldNames) {
            foreach ($fieldNames as $fieldName) {
                $field = $fields[$resourceName . '__' . $fieldName];
                $jsonApi->addField($field);
            }
        }
        $uri = '/articles?include=author&fields[articles]=title,body,author&fields[people]=name';
        $this->assertEquals($uri, $jsonApi->generateUri());
    }

    /**
     * @covers ::setPage
     * @covers ::generateIncludeText
     * @covers ::generateFieldText
     * @covers ::generatePageText
     * @covers ::generateUri
     */
    public function testGeneratePageText()
    {
        $resource = new Resource('articles');
        $getter = new Getter($resource);
        $page = new Page(3, 1);
        $getter->setPage($page);
        $url = '/articles?page[number]=3&page[size]=1';
        $this->assertEquals($url, $getter->generateUri());
    }
}
