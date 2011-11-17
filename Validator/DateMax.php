<?php
/**
 * @author Nicolas Potier <nicolas.potier@acseo-conseil.fr>
 */
namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Date;
/**
 * @Annotation
 *
 * @api
 */
class DateMaw extends Date
{
    public $message = 'This date is not valid. It should be before {{ dateMax }}';
    public $dateMax;

    /**
     * {@inheritDoc}
     */
    public function getDefaultOption()
    {
        return 'dateMax';
    }

    /**
     * {@inheritDoc}
     */
    public function getRequiredOptions()
    {
        return array('dateMax');
    }
}
