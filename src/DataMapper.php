<?php
declare(strict_types=1);
namespace I3or1s;

use Closure;

class DataMapper
{
    /** @var Closure */
    private $sink;

    /** @var Closure */
    private $pump;

    /** @var TranslatorBuilder */
    private $translatorBuilder;

    private function __construct() {}

    public static function build($pump, $sink): DataMapper {
        $self = new self();
        $self->sink = $sink;
        $self->pump = $pump;
        $self->translatorBuilder = TranslatorBuilder::create();

        return $self;
    }

    public function addTranslation(Translator $translator) {
        $this->translatorBuilder->register($translator);
    }

    public function filter(array $whatToMap): object {
        $whatToMap = ($this->pump)($whatToMap);
        $context = new Context();
        foreach ($whatToMap as $key => $value) {
            $context->set($key, $value);
        }
        return ($this->sink)($this->translatorBuilder->translate($context));
    }
}
