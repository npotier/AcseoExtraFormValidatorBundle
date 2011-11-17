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
class BirthDay extends Date
{
    public $messageBirthday = 'This value is not a valid birthday';
}
