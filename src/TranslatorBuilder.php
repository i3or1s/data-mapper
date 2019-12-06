<?php
declare(strict_types=1);

namespace I3or1s;

final class TranslatorBuilder
{
    /** @var Translator[] */
    private $translators = [];

    private function __construct(){}

    public static function create(): TranslatorBuilder {
        return new self();
    }

    public function register(Translator $translator): void {
        $this->translators[] = $translator;
    }

    public function translate(Context $context): Context {
        $translatedContext = new Context();
        foreach ($this->translators as $translator) {
            $mappedObj = $translator->translate($context);
            $translatedContext->set($mappedObj->name(), $mappedObj->value());
        }
        return $translatedContext;
    }
}
