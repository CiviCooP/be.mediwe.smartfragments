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


    $sql = "SELECT b.entity_id id
    ,      b.body_value fragment
    ,      ref.field_reference_value reference
    ,      l.field_language_value language
    ,      t.name
    ,      c.field_civi_contact_contact_id contact_id
    FROM   field_data_field_reference ref
    JOIN   field_data_body b ON (b.entity_id = ref.entity_id and b.entity_type='node')
    JOIN   field_data_field_language l ON (l.entity_id = ref.entity_id and l.entity_type='node')
    JOIN   field_data_field_application a ON (a.entity_id = ref.entity_id and a.entity_type='node')
    JOIN   taxonomy_term_data t ON (a.field_application_tid = t.tid  )
    JOIN   taxonomy_vocabulary v ON (v.vid = t.vid and v.machine_name='application')
    LEFT JOIN   field_data_field_civi_contact c ON (c.entity_id = ref.entity_id and c.entity_type='node')";

    $where = 'where l.field_language_value = :language and t.name = :application';

    $args[':language'] = $params['language'];
    $args[':application'] =$params['application'];

    if(isset($params['contact_id'])){
      $args[':contact_id'] = $params['contact_id'];
      $where .= ' and c.field_civi_contact_contact_id = :contact_id';
    }

    $rset = db_query($sql.' '.$where,$args);

    $row = $rset->fetchAssoc();


    return $row;

  }

}