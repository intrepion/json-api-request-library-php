<?php

namespace Intrepion\JsonApi\Request\HttpVerbs;

use Intrepion\JsonApi\Request\Field;
use Intrepion\JsonApi\Request\Resource;

/**
 * Getter
 */
class Getter
{
    /**
     * @var Resource
     */
    protected $resource;

    /**
     * @var array
     */
    protected $includes;

    /**
     * @var array
     */
    protected $fields;

    /**
     * Constructor
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->fields = array();
        $this->includes = array();
        $this->resource = $resource;
    }

    /**
     * Add include
     * @param string   $associationName
     * @param Resource $include
     */
    public function addInclude($associationName, Resource $include)
    {
        $this->includes[$associationName] = $include;
    }

    /**
     * Generate URI
     *
     * @return string
     */
    public function generateUri()
    {
        $uri = '/' . $this->resource->getName();
        $includesLength = count($this->includes);
        if (0 < $includesLength) {
            $includeText = '?include=';
            $i = 0;
            foreach ($this->includes as $associationName => $resource) {
                if (0 < $i) {
                    $includeText .= ',';
                }
                $includeText .= $associationName;
                $i++;
            }
            $uri .= $includeText;
        }

        return $uri;
    }
}
