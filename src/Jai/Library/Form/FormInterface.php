<?php namespace Jai\Library\Form;

interface formInterface
{
    public function process(array $input);
    public function delete(array $input);
    public function getErrors();
}