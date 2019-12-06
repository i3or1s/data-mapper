<?php
declare(strict_types=1);

class Account
{
    private $data = [];

    private function __construct(){
    }

    public static function create($id, $name, $address) {
        $self = new self();
        $self->data = [
            "id" => $id,
            "name" => $name,
            "address" => $address
        ];

        return $self;
    }

    public function __toString()
    {
        return json_encode($this->data);
    }
}