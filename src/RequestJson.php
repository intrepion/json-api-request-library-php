<?php

namespace Intrepion\JsonApi\Request;

class RequestJson
{
    protected $resourceName;

    public function setResourceName($resourceName)
    {
        if (!is_string($resourceName)) {
            throw new \InvalidArgumentException('resourceName should be a string');
        }
        $this->resourceName = $resourceName;

        return $this;
    }

    public function getResourceName()
    {
        return $this->resourceName;
    }
}
