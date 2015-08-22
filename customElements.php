<?php
    Element::createCustomElement('container', 'div', [
        'class' => 'container-fluid'
    ]);

    Element::createCustomElement('row', 'div', [
        'class' => 'row'
    ]);

    Element::createCustomElement('navbar', 'nav', [
        'class' => 'navbar navbar-default'
    ]);

    Element::createCustomElement('navbar-header', 'div', [
        'class' => 'navbar-header'
    ]);

    Element::createCustomElement('navbar-collapse', 'div', [
        'class' => 'collapse navbar-collapse'
    ]);

    Element::createCustomElement('navbar-list', 'ul', [
        'class' => 'nav navbar-nav'
    ]);

    Element::createCustomElement('button-group', 'div', [
        'class' => 'btn-group',
        'role' => 'group'
    ]);

    Element::createCustomElement('button-default', 'div', [
        'class' => 'btn btn-default'
    ]);

    Element::createCustomElement('icon-bar', 'span', [
        'class' => 'icon-bar'
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
