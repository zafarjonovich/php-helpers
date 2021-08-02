<?php

namespace zafarjonovich\PHPHelpers;

class BaseString
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function length()
    {
        return strlen($this->string);
    }

    public function charAt($offset)
    {
        return isset($this->string[$offset])?$this->string[$offset]:'';
    }

    public function match($regexp)
    {
        preg_match($regexp,$this->string,$matches);
        return $matches;
    }

    public function concat($string)
    {
        if($string instanceof BaseString)
            $string = (string)$string;

        if(!is_string($string))
            throw new \Exception('Invalid argument, $string argument must be string type');

        $this->string .= $string;

        return $this;
    }

    public function isEmpty()
    {
        return (bool)$this->string;
    }

    public function split($separator)
    {
        return explode($separator,$this->string);
    }

    public function trim()
    {
        $this->string = trim($this->string);
        return $this;
    }

    public function indexOf($find)
    {
        return ($position = strpos($this->string,$find)) !== false?$position:-1;
    }

    public function substring($offset,$length = null)
    {
        if($length === null)
            $this->string = substr($this->string,$offset);
        else
            $this->string = substr($this->string,$offset,$length);

        return $this;
    }

    public function toString()
    {
        return $this->string;
    }

    public function __toString()
    {
        return $this->toString();
    }
}