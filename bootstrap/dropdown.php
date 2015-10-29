<?php
    namespace oohtml\bootstrap;

    class Dropdown extends \oohtml\Template {
        public function __construct ($name) {
            $base = new \oohtml\Element("li", [
                "class" => "dropdown"
            ]);

            $toggle = $base->createElement("a", [
                "href" => "#",
                "class" => "dropdown-toggle",
                "data-toggle" => "dropdown",
                "role" => "button",
                "aria-haspopup" => "true",
                "aria-expanded" => "false"
            ]);
            $toggle->addContent($name);

            $menu = $base->createElement("ul", [
                "class" => "dropdown-menu"
            ]);

            $this->template = (object)compact("base", "toggle", "menu");
        }

        public function add ($element, $text, $options) {
            $menuItem = $this->template->menu->createElement("li");

            $element = $menuItem->createElement($element, $options);
            $element->addContent($text);

            return $element;
        }
    }
