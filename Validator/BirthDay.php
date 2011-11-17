<?php

namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 *
 * @api
 */
class BirthDay extends Constraint
{
    public $message = 'This value is not a valid birthday';
}
