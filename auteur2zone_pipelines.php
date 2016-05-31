<?php
/**
 * Utilisations de pipelines par Auteur2Zone
 *
 * @plugin     Auteur2Zone
 * @copyright  2014
 * @author     vertige
 * @licence    GNU/GPL
 * @package    SPIP\Auteur2zone\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function auteur2zone_post_insertion($flux) {

    if ($flux['args']['table'] == 'spip_auteurs') {
        // Récupérer la configuration du plugin
        $config = lire_config('auteur2zone');

        // Lier à la zone
        include_spip('action/editer_zone');
        include_spip('inc/autoriser');
        // cas de l'inscription par formulaire public : autoriser un nouvel inscrit à s'inscrire à une zone
        if($config['autoriser_visiteur']){
          autoriser_exception('affecterzones', 'auteur', $flux['args']['id_objet'], true);  
        }
        zone_lier($config['auteur_zone_auto'],'auteur',$flux['args']['id_objet']);
        autoriser_exception('affecterzones', 'auteur', $flux['args']['id_objet'], false);
  
    }

    return $flux;
}