<?php
use CRM_Smartfragments_ExtensionUtil as E;

/**
 * TextFragment.Get API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_text_fragment_Get_spec(&$spec) {
  $spec['application'] = array (
    'name' => 'application',
    'title' => 'Toepassing waarbinnen de tekstfragmenten gebruikt worden',
    'api.required' => 1,
    'description' => 'Code waarmee de tekst gevonden kan worden',
    'type' => CRM_Utils_Type::T_STRING,
  );
  $spec['language'] = array (
      'name' => 'language',
      'title' => 'Taal',
      'api.required' => 1,
      'description' => 'Taal van het fragment (twee letter iso code)',
      'type' => CRM_Utils_Type::T_STRING,
  );
  $spec['contact_id'] = array (
    'name' => 'contact_id',
    'title' => 'Mediwe Klant',
    'api.required' => 0,
    'description' => 'Contact Id van de Mediwe klant waarvoor een aparte tekst wordt aangemaakt',
    'type' => CRM_Utils_Type::T_INT,
  );
  $spec['check'] = array (
    'name' => 'check',
    'title' => 'Controle',
    'api.required' => 0,
    'description' => 'Met check wat meer controles, zet deze aan bij testen',
    'type' => CRM_Utils_Type::T_STRING,
  );

}

/**
 * TextFragment.Get API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_text_fragment_Get($params) {

  $textfragment = new CRM_Smartfragments_TextFragment();
  return civicrm_api3_create_success($textfragment->get($params), $params, 'TextFragment', 'Get');
}
