<?php
declare(strict_types=1);

namespace I3or1s;

class MappedObject
{
    private $name;
    private $value;

    public static function create(string $name, $value): MappedObject {
        $self = new self();
        $self->name = $name;
        $self->value = $value;

        return $self;
    }

    public function name(): string {
        return $this->name;
    }

    public function value() {
        return $this->value;
    }
}