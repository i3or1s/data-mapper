<?php
declare(strict_types=1);

namespace I3or1s\Translator;

use I3or1s\Context;
use I3or1s\MappedObject;
use I3or1s\Translator;

final class StringTranslator implements Translator
{
    /** @var string */
    private $from;

    /** @var string */
    private $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function translate(Context $context): MappedObject
    {
        return MappedObject::create($this->to, $context->get($this->from));
    }
}