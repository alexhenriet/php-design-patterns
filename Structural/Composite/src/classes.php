<?php

interface FsElement
{
    public function getPath();
    public function getSize();
    public function setParent(FsElement $parent);
}

interface FsContainer
{
    public function addElement(FsElement $element);
}

trait FsElementCommon
{
    public function getPath()
    {
        return $this->parent ? $this->parent->getPath() . '/' . $this->name : $this->name;
    }


    public function setParent(FsElement $parent)
    {
        $this->parent = $parent;
    }
}

class Folder implements FsElement, FsContainer
{
    use FsElementCommon;

    private $name;
    private $elements;
    private $parent = null;

    public function __construct($name)
    {
        $this->name = $name;
        $this->elements = new \SplObjectStorage();
    }

    public function getSize()
    {
        $size = 0;
        foreach( $this->elements as $element) {
            $size += $element->getSize();
        }
        return $size;
    }

    public function addElement(FsElement $element)
    {
        $element->setParent($this);
        $this->elements->attach($element);
    }
}

class File implements FsElement
{
    use FsElementCommon;

    private $name;
    private $size;
    private $parent = null;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }
}