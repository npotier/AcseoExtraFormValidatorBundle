<?php

namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\DateValidator;

/**
 * @api
 */
class BirthDayValidator extends DateValidator
{
    /**
     * Checks if the passed value is a valid Birthday (i.e. in the past)
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @return Boolean Whether or not the value is valid
     *
     * @api
     */
	const PATTERN_BIRTHDAY = '/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/';
	
    public function isValid($value, Constraint $constraint)
    {
    	if (parent::isValid($value, $constraint))
    	{
   		if ($value instanceof \DateTime)
    			$tm = $value->getTimestamp();
        	else {
        		preg_match(self::PATTERN_BIRTHDAY, string($value), $matches);
    			$tm = mktime($matches[4],$matches[5],$matches[6], $matches[2], $matches[3], $matches[1]);
        	}
    		if(time() > $tm)
    			return true;   		
    		$this->setMessage($constraint->messageBirthday, array('{{ value }}' => $value));
    	}
    	return false;
    }
}
