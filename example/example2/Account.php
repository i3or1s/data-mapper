<?php
declare(strict_types=1);

use I3or1s\Context;

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

class AccountSink
{
    public function __invoke(Context $context)
    {
        return Account::create($context->get('id'), $context->get('name'), $context->get('address'));
    }
}