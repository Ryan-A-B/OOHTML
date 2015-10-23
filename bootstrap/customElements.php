<?php
    namespace oohtml;

    Element::createCustomElement('bs-container-fluid', 'div', [
        'class' => 'container-fluid'
    ]);

    Element::createCustomElement('bs-row', 'div', [
        'class' => 'row'
    ]);

    Element::createCustomElement('bs-form-group', 'div', [
        'class' => 'form-group'
    ]);

    Element::createCustomElement('bs-button-group', 'div', [
        'class' => 'btn-group',
        'role' => 'group'
    ]);

    Element::createCustomElement('bs-button', 'div', [
        'class' => 'btn btn-default active'
    ]);
?>
