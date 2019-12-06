<?php
declare(strict_types=1);
namespace I3or1s;

class Context
{
    private $data = [];

    public function get(string $name) {
        if(!isset($this->data[$name])) {
            return '';
        }
        return $this->data[$name];
    }

    public function set(string $name, $value): void {
        $this->data[$name] = $value;
    }
}