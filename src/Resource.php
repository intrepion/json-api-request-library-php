<?php

namespace Intrepion\JsonApi\Request;

/**
 * Resource
 */
class Resource
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Constructer
     * @param string $name
     */
    public function __construct($name)
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
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
