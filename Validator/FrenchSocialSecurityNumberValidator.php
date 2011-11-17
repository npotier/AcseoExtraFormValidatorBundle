<?php
/**
 * @author Nicolas Potier. nicolas.potier@acseo-conseil.fr
 */
namespace Acseo\Bundle\ExtraFormValidatorBundle\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\ConstraintValidator;

/**
 * @api
 */
class FrenchSocialSecurityNumberValidator extends ConstraintValidator {
    /**
     * Checks if the passed value is a valid French social security number
     * Based on conversation at http://www.developpez.net/forums/d677820/php/langage/regex/verification-numero-securite-sociale/
     * and http://fr.wikipedia.org/wiki/Num%C3%A9ro_de_s%C3%A9curit%C3%A9_sociale_en_France#Signification_des_chiffres_du_NIR
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @return Boolean Whether or not the value is valid
     *
     * @api
     */
	const PATTERN = '/^(?<sexe>[1278])(?<annee>[0-9]{2})(?<mois>0[1-9]|1[0-2]|20)(?<departement>[02][1-9]|2[AB]|[1345678][0-9]|9[012345789])(?<numcommune>[0-9]{3})(?<numacte>00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})(?<clef>0[1-9]|[1-8][1-9]|9[1-7])?$/x';
	
    public function isValid($value, Constraint $constraint)
    {
    	if (!preg_match(self::PATTERN, $value, $match)) {
        	return false;
    	}
	    //base du calcul par défaut pour la clef (est modifié pour la corse)
	    $aChecker = floatval(substr($value, 0, 13));
 
	    /* Traitement des cas des personnes nées hors métropole ou en corse*/
        //départements corses. Le calcul de la cles est différent
        if ($match['departement'] == '2A') {
        	$aChecker = floatval(str_replace('A', 0, substr($value, 0, 13))) - 1000000;
        }
        else if ($match['departement'] == '2B') {
        	$aChecker = floatval(str_replace('B', 0, substr($value, 0, 13))) - 2000000;
        }
		else if ($match['departement'] == 97 || $match['departement'] == 98) {
	        $match['numcommune'] = substr($return['numcommune'], 1, 2) ;
		}
	    if ($match['numcommune'] > 990) { 
	    	//990 = pays inconnu
        	return false ;
	    }
	    $clef = 97 - fmod($aChecker, 97) ;
    	if (!empty($match['clef']) && $clef != $match['clef']) {
        	return false ;
    	}
 
	    return true ;
    }
}
