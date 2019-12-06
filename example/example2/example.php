<?php
declare(strict_types=1);

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . '/Account.php';
require_once __DIR__ . '/Address.php';

$definition = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . "/../example_definition.yaml"));

$mappers = [];
foreach ($definition['mapper'] as $mapper) {
    $mappers[$mapper["name"]] = \I3or1s\DataMapper::build(new $mapper['pump'], new $mapper['sink']);
    foreach($mapper['translation'] as $translation) {
        if(isset($translation['arguments']) && is_array($translation['arguments'])) {
            $translation = new $translation['class'](...$translation['arguments']);
        } else {
            $translation = new $translation['class']();
        }
        $mappers[$mapper["name"]]->addTranslation($translation);
    }
}

$account = $mappers['AccountMapper']->filter(
    \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . "/../example_input.yaml"))
);

echo $account;

