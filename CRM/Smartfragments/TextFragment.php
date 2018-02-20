<?php
/**
 * Class om een tekst fragment op te halen, vanuit een drupal CMS.
 *
 * @author Klaas Eikelboom (CiviCooP) <klaas.eikelboom@civicoop.org>
 * @date 20 februari 2017
 * @license AGPL-3.0
 */

class CRM_Smartfragments_TextFragment {

  public function languages() {
    /* TODO dit lijstje is natuurlijk ook uit drupal op halen */
    return ['NL', 'FR', 'EN'];
  }

  public function get($params) {

    if (!in_array($params['language'], $this->languages())) {
      throw new CiviCRM_API3_Exception("Language {$params['language']} not found");
    }

    /* hier begint het drupal gedeelte */

    if (isset($params['contact_id'])) {
      /* bestaat er een contact id dan wordt hier eerst mee gezocht */

      $sql = "SELECT b.entity_id id
     ,      b.body_value fragment
     ,      ref.field_reference_value reference
     ,      l.field_language_value language
     FROM   field_data_field_reference ref
     JOIN   field_data_body b ON (b.entity_id = ref.entity_id AND b.entity_type='node')
     JOIN   field_data_field_language l ON (l.entity_id = ref.entity_id AND l.entity_type='node')
     JOIN   field_data_field_civi_contact c ON (c.entity_id = ref.entity_id AND c.entity_type='node')
     WHERE  field_reference_value  = :reference AND field_language_value = :language AND field_civi_contact_contact_id = :contact_id";

      $args = [
        ':reference' => $params['reference'],
        ':language' => $params['language'],
        ':contact_id' => $params['contact_id'],
      ];

      $result = db_query($sql, $args);

      /* is er resultaat dan wordt dit teruggegeven, en is de
         de functie klaar */
      if (($result->rowCount()) > 0) {
        return [
          'textfragment' => $result->fetchField(1),
        ];

      };
      /* zonder resultaat word de procedure voor zoeken zonder contact id gevolgt*/
    }

    $sql = "SELECT b.entity_id id
     ,      b.body_value fragment
     ,      ref.field_reference_value reference
     ,      l.field_language_value language
     FROM   field_data_field_reference ref
     JOIN   field_data_body b ON (b.entity_id = ref.entity_id AND b.entity_type='node')
     JOIN   field_data_field_language l ON (l.entity_id = ref.entity_id AND l.entity_type='node')
     WHERE  field_reference_value  = :reference AND field_language_value = :language 
     AND    NOT exists (SELECT 1 FROM field_data_field_civi_contact c WHERE c.entity_id=l.entity_id)";
     /* bovenstaande not exists zorgt ervoor dat een klantspecifieke tekst niet uit een algemene search
        komt */
    $args = [
      ':reference' => $params['reference'],
      ':language' => $params['language'],
    ];

    return [
      'textfragment' => db_query($sql, $args)->fetchField(1),
    ];

  }

}