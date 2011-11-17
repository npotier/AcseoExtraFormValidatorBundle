<?php
/**
 * @author Nicolas Potier. nicolas.potier@acseo-conseil.fr
 */
namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Date;
/**
 * @Annotation
 *
 * @api
 */
class FrenchSocialSecurityNumber extends Constraint
{
    public $message = 'This value is not a valid French social security number';
}
