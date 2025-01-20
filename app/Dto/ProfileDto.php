<?php

namespace App\Dto;

use MongoDB\Laravel\Eloquent\Model;
use Parse\ParseObject;

class ProfileDto
{
    public function __construct(
        protected $target
    ) 
    { 
        
    }

    public function __get($name)
    {
        if ($this->target instanceof Model) {
            return $this->target->{$name};
        }

        if ($name == 'id') {
            return $this->target->getObjectId();
        }

        return $this->target->get($name);
    }

    public function __isset($name)
    {
        if ($this->target instanceof Model) {
            return $this->target->{$name} != '';
        }

        if ($name == 'id') {
            return $this->target->getObjectId() != '';
        }

        return $this->target->get($name) != '';
    }

    public function __call($name, $arguments)
    {
        if ($this->target instanceof Model) {
            return call_user_func([$this->target, $name], $arguments);
        }

        if (method_exists($this->target, $name)) {
            return call_user_func([$this->target, $name], $arguments);
        } else if (method_exists($this, $name)) {
            return call_user_func([$this, $name], $arguments);
        } else {
            return ;
        }
    }

    public function fill(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->target->setAssociativeArray($key, $value);
                continue ;
            }
            $this->target->set($key, $value);
        }
    }

    public function toArray()
    {
        if ($this->target instanceof Model) {
            return $this->target->toArray();
        }

        return $this->target->getAllKeys();
    }
}