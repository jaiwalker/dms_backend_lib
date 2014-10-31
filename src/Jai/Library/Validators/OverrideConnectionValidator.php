<?php namespace Jai\Library\Validators;

use Illuminate\Validation\DatabasePresenceVerifier;
use Jai\Library\Traits\OverrideConnectionTrait;
use Jai\Library\Validators\AbstractValidator;

class OverrideConnectionValidator extends AbstractValidator
{
    use OverrideConnectionTrait;
    /**
     * @param $input
     * @return mixed
     * @override
     */
    public function instanceValidator($input)
    {
        $validator = V::make($input, static::$rules);
        // update presence verifier
        $validator->getPresenceVerifier()->setConnection($this->getConnection());
        return $validator;
    }
} 