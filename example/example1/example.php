<?php

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . '/Account.php';
require_once __DIR__ . '/Address.php';

$mapper = \I3or1s\DataMapper::build(function(array $input){
    return $input;
}, function(\I3or1s\Context $context){
    return Account::create($context->get('id'), $context->get('name'), $context->get('address'));
});
$mapper->addTranslation(new Address());
$mapper->addTranslation(new \I3or1s\Translator\StringTranslator('EmployeeId', 'id'));
$mapper->addTranslation(new \I3or1s\Translator\StringTranslator('Name', 'name'));

$account = $mapper->filter(
    \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__ . "/../example_input.yaml"))
);

echo $account;


