<?php
declare(strict_types=1);

use I3or1s\Context;
use I3or1s\MappedObject;
use I3or1s\Translator;

final class Address implements Translator
{
    public function translate(Context $context) : MappedObject {
        return MappedObject::create(
            'address',
            sprintf("%s - %s", $context->get('HomeAddress'), $context->get('WorkAddress'))
        );
    }
}