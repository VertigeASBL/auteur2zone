<?php

function formulaires_configurer_auteur2zone_saisies_dist() {
    $saisies = array(
        array(
            'saisie' => 'zones',
            'options' => array(
                'nom' => 'auteur_zone_auto',
                'label' => _T('auteur2zone:label_zone_inscription'),
                'explication' => _T('auteur2zone:explication_zone_inscription')
            )
        )
    );

    return $saisies;

}

function formulaires_configurer_auteur2zone_charger_dist() {
    $config = lire_config('auteur2zone');
    return $config;
}