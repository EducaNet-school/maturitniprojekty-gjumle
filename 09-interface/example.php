<?php

// Declare the interface Countable
interface Countable
{
    public function count();
}

// Declare the interace Iterator
interface Iterator
{
    public function current();
    public function key();
    public function next();
    public function rewind();
    public function valid();
}

// Declare the interface ArrayAccess
interface ArrayAccess
{
    public function offsetExists($offset);
    public function offsetGet($offset);
    public function offsetSet($offset, $value);
    public function offsetUnset($offset);
}

// Implement the interfaces
class ImpComposition implements Countable, Iterator, ArrayAccess
{
    private $data = array();
    private $position = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function count()
    {
        return count($this->data);
    }

    public function current()
    {
        return $this->data[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        return isset($this->data[$this->position]);
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (!is_int($value)) {
            throw new Exception('Invalid data type, must be integer');
        }

        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
