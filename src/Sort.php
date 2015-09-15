<?php

namespace Intrepion\JsonApi\Request;

/**
 * Sort
 */
class Sort
{
    /**
     * @var Field
     */
    protected $field;

    /**
     * @var boolean
     */
    protected $ascending;

    /**
     * Constructer
     * @param Field $field
     * @param boolean $ascending
     */
    public function __construct(Field $field, $ascending)
    {
        $this->field = $field;
        if (!is_bool($ascending)) {
            throw new \InvalidArgumentException('ascending should be a boolean');
        }
        $this->ascending = $ascending;
    }

    /**
     * Get field
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Get ascending
     * @return boolean
     */
    public function getAscending()
    {
        return $this->ascending;
    }
}
