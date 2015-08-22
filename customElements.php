<?php
    Element::createCustomElement('container', 'div', [
        'class' => 'container-fluid'
    ]);

    Element::createCustomElement('row', 'div', [
        'class' => 'row'
    ]);

    Element::createCustomElement('carousel', 'div', [
        'class' => 'carousel slide',
        'date-ride' => 'carousel'
    ]);

    Element::createCustomElement('carousel-indicators', 'ol', [
        'class' => 'carousel-indicators'
    ]);

    Element::createCustomElement('carousel-inner', 'div', [
        'class' => 'carousel-inner',
        'role' => 'listbox'
    ]);

    Element::createCustomElement('carousel-item', 'div', [
        'class' => 'item'
    ]);
?>
