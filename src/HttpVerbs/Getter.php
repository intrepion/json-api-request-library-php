<?php

namespace Intrepion\JsonApi\Request\HttpVerbs;

use Intrepion\JsonApi\Request\Field;
use Intrepion\JsonApi\Request\Page;
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
     * @var Page
     */
    protected $page;

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
     * @return Getter
     */
    public function addInclude($associationName, Resource $include)
    {
        $this->includes[$associationName] = $include;

        return $this;
    }

    /**
     * Add field
     * @param Field $field
     * @return Getter
     */
    public function addField(Field $field)
    {
        $resourceName = $field->getResource()->getName();
        if (!array_key_exists($resourceName, $this->fields)) {
            $this->fields[$resourceName] = array();
        }
        $this->fields[$resourceName][] = $field;

        return $this;
    }

    /**
     * Set page
     * @param Page $page
     * @return Getter
     */
    public function setPage(Page $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Generate includeText
     *
     * @return string
     */
    public function generateIncludeText()
    {
        $includesLength = count($this->includes);
        if (0 === $includesLength) {
            return '';
        }
        $includeText = 'include=';
        $i = 0;
        foreach ($this->includes as $associationName => $resource) {
            if (0 < $i) {
                $includeText .= ',';
            }
            $includeText .= $associationName;
            $i++;
        }

        return $includeText;
    }

    /**
     * Generate fieldText
     *
     * @return string
     */
    public function generateFieldText()
    {
        if (0 === count($this->fields)) {
            return '';
        }
        $fieldTexts = array();
        foreach ($this->fields as $resourceName => $fields) {
            $fieldArray = array_map(
                function (Field $field)
                {
                    return $field->getName();
                },
                $fields
            );
            $fieldText = 'fields['
                . $resourceName
                . ']='
                . implode(',', $fieldArray);
            $fieldTexts[] = $fieldText;
        }

        return implode('&', $fieldTexts);
    }

    /**
     * Generate pageText
     *
     * @return string
     */
    public function generatePageText()
    {
        if (is_null($this->page)) {
            return '';
        }
        $pageText = 'page[number]='
            . $this->page->getNumber()
            . '&page[size]='
            . $this->page->getSize();

        return $pageText;
    }

    /**
     * Generate URI
     *
     * @return string
     */
    public function generateUri()
    {
        $uri = '/' . $this->resource->getName();
        $queryString = array();
        $includeText = $this->generateIncludeText();
        if ('' !== $includeText) {
            $queryString[] = $includeText;
        }
        $fieldText = $this->generateFieldText();
        if ('' !== $fieldText) {
            $queryString[] = $fieldText;
        }
        $pageText = $this->generatePageText();
        if ('' !== $pageText) {
            $queryString[] = $pageText;
        }
        if (0 < count($queryString)) {
            $uri .= '?' . implode('&', $queryString);
        }

        return $uri;
    }
}
