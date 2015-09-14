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
        $uri = '/' . rawurlencode($this->resource->getName());
        $length = count($this->includes);
        if (0 < $length) {
            $uri .= '?include=';
            $include = '';
            for ($i = 0; $i < $length; $i++) {
                if (0 < $i) {
                    $include .= ',';
                }
                $include .= $this->includes[$i]->getName();
            }
            $uri .= urlencode($include);
        }

        return $uri;
    }
}
