<?php

namespace Intrepion\JsonApi\Request;

/**
 * Get
 */
class Get
{
    /**
     * @var string
     */
    protected $resourceName;

    /**
     * Set resourceName
     *
     * @param string $resourceName
     * @return Get
     */
    public function setResourceName($resourceName)
    {
        if (!is_string($resourceName)) {
            throw new \InvalidArgumentException('resourceName should be a string');
        }
        $this->resourceName = $resourceName;

        return $this;
    }

    /**
     * Get resourceName
     *
     * @return string
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }
}
