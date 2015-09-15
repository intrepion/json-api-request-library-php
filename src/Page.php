<?php

namespace Intrepion\JsonApi\Request;

/**
 * Page
 */
class Page
{
    /**
     * @var integer
     */
    protected $number;

    /**
     * Constructer
     * @param integer $number
     * @param integer $size
     */
    public function __construct($number, $size)
    {
        if (!is_integer($number)) {
            throw new \InvalidArgumentException('number should be an integer');
        }
        if (0 === $number) {
            throw new \InvalidArgumentException('number should not be zero');
        }
        if (0 > $number) {
            throw new \InvalidArgumentException('number should not be negative');
        }
        $this->number = $number;
        if (!is_integer($size)) {
            throw new \InvalidArgumentException('size should be an integer');
        }
        if (0 === $size) {
            throw new \InvalidArgumentException('size should not be zero');
        }
        if (0 > $size) {
            throw new \InvalidArgumentException('size should not be negative');
        }
        $this->size = $size;
    }

    /**
     * Get number
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get size
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }
}
