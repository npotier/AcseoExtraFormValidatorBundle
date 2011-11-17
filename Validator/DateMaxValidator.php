<?php
/**
 * @author Nicolas Potier <nicolas.potier@acseo-conseil.fr>
 */
namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\DateValidator;

/**
 * @api
 */
class DateMaxValidator extends DateValidator
{
    /**
     * Checks if the passed value is a valid date and if the (i.e. in the past)
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
    	if (parent::isValid($value, $constraint)) {
	   		if ($value instanceof \DateTime) {
				$tm = $value->getTimestamp();
	   		} else {
	    		$tm = mktime((string) $value);
	        }
	    	if( mktime($constraint->dateMax) > $tm) {
	    		return true;
	    	}   		
    		$this->setMessage($constraint->message, array(
    			'{{ value }}' => $value, 
    			'{{ dateMax }}' => $constraint->dateMax)
    		);
    	}

    	return false;
    }
}
