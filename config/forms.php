<?php

return [
    'default_form' => [
        ['name' => 'name', 'type' => 'text', 'label' => 'Nom Prénom(s) :', 'required' => true],
        ['name' => 'phone', 'type' => 'text', 'label' => 'Numéro de téléphone (WhatsApp) :', 'required' => true],
    ],
    'categories' => [
        'Entreprendre dans les industries culturelles et créatives',
        'Goût de chez nous (les mets burkinabè)',
        'Redécouverte des instruments traditionnels',
        'Les jeunes et la création de contenus culturels au Burkina Faso',
    ],

    'badge_request_form' => [
        ['name' => 'media_name', 'type' => 'text', 'label' => 'Nom du média :', 'required' => true],
        ['name' => 'media_type', 'type' => 'select', 'label' => 'Type de média :', 'options' => [
            'En ligne',
            'Presse écrite',
            'Photographie',
            'Autres',
        ], 'required' => true],
        ['name' => 'contact_email', 'type' => 'email', 'label' => 'Email de contact :', 'required' => true],
        ['name' => 'contact_phone', 'type' => 'text', 'label' => 'Téléphone de contact :', 'required' => true],
        ['name' => 'badge_count', 'type' => 'number', 'label' => 'Nombre de badges souhaité (maximum 3) :', 'required' => true],
    ],
];
