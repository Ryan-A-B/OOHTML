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

        public function addButton ($text, $options) {
            $menuItem = $this->template->menu->createElement("li");

            $button = $menuItem->createElement("button", array_merge([
                "type" => "button"
            ], $options));
            $button->addContent($text);

            return $button;
        }
    }
