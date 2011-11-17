<?php


namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @api
 */
class BirthDayValidator extends DateValidator
{
    const PATTERN = '/^(\d{4})-(\d{2})-(\d{2})$/';

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @return Boolean Whether or not the value is valid
     *
     * @api
     */
    public function isValid($value, Constraint $constraint)
    {
    	if (parent::isValid($value, $constraint))
    	{
    		preg_match(static::PATTERN, $value, $matches);
    		tm = mktime(0,0,0)
    	}
    	return true;
    }
}
