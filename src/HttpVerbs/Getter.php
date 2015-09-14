<?php

namespace Intrepion\JsonApi\Request\HttpVerbs;

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
     * Constructor
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->includes = array();
        $this->resource = $resource;
    }

    public function addInclude(Resource $include)
    {
        $this->includes[] = $include;
    }

    /**
     * Generate URI
     *
     * @return string
     */
    public function generateUri()
    {
        $uri = '/' . $this->resource->getName();
        $length = count($this->includes);
        if (0 < $length) {
            $uri .= '?include=';
            for ($i = 0; $i < $length; $i++) {
                $uri .= $this->includes[$i]->getName();
            }
        }

        return $uri;
    }
}
