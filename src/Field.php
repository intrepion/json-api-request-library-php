<?php

namespace Intrepion\JsonApi\Request;

/**
 * Field
 */
class Field
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Resource
     */
    protected $resource;

    /**
     * Constructer
     * @param string $name
     * @param Resource $resource
     */
    public function __construct($name, Resource $resource)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException('name should be a string');
        }
        if ('' === $name) {
            throw new \InvalidArgumentException('name should not be an empty string');
        }
        $matchesLength = preg_match('/\s/', $name);
        if (0 < $matchesLength) {
            throw new \InvalidArgumentException('name cannot have any whitespace');
        }
        $this->name = $name;
        $this->resource = $resource;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get resource
     * @return Resource
     */
    public function getResource()
    {
        return $this->resource;
    }
}
