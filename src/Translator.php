<?php
declare(strict_types=1);

namespace I3or1s;

interface Translator
{
    public function translate(Context $context): MappedObject;
}