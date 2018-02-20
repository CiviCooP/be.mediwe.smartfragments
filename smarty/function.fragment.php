<?php
/**
 * Created by PhpStorm.
 * User: klaas
 * Date: 15-2-18
 * Time: 15:58
 */


function _smartfragments_node($reference){
    /* drupal stuff */
    $sql = "SELECT b.body_value nl
    ,      fr.field_inhoud_fr_value fr
    ,      ref.field_referentie_value
    FROM   field_data_field_referentie ref
    JOIN   field_data_body b ON (b.entity_id = ref.entity_id)
    JOIN   field_data_field_inhoud_fr  fr ON (fr.entity_id = ref.entity_id)
    where  field_referentie_value = :reference
    ";
    return db_query($sql,['reference' => $reference])->fetchField(1);
    ;

}

function smarty_function_fragment($params, &$smarty) {
   if($params['reference']){
       return 'The referred argument is the params reference '._smartfragments_node($params['reference']);
   }
   return "This is the fragment";
}