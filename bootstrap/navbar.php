<?php
    namespace oohtml\bootstrap;

    class Navbar extends \oohtml\Template {
        public static $defaults = [
            "base" => [
                "class" => "navbar-default"
            ],
            "menuToggle" => [
                "data-target" => "#bs-navbar"
            ],
            "brand" => [
                "href" => "/"
            ],
            "menu" => [
                "id" => "bs-navbar"
            ]
        ];

        public function __construct (array $options = []) {
            $this->options = array_replace_recursive(self::$defaults, $options);

            $base = new \oohtml\Element("nav", [
                "class" => "navbar"
            ]);

            $container = $base->createElement("bs-container-fluid");

            $header = $container->createElement("div", [
                "class" => "navbar-header"
            ]);

            $menuToggle = $header->createElement("button", [
                "type" => "button",
                "class" => "navbar-toggle collapsed",
                "data-toggle" => "collapse",
                "aria-expanded" => "false"
            ]);

            $tmp = $menuToggle->createElement("span", ["class" => "sr-only"]);
            $tmp->addContent("Toggle navigation");

            for ($i = 0; $i < 3; $i++) {
                $menuToggle->createElement("span", ["class" => "icon-bar"]);
            }

            $brand = $header->createElement("a", [
                "class" => "navbar-brand"
            ]);

            $menu = $container->createElement("div", [
                "class" => "collapse navbar-collapse"
            ]);

            $this->template = (object)compact("base", "container", "header", "menuToggle", "brand", "menu");
        }

        public function addMenu ($leftAligned = true) {
            $alignment = "navbar-" . ($leftAligned ? "left" : "right");

            $this->template->menuList = $this->template->menu->createElement("ul", [
                "class" => "nav navbar-nav $alignment"
            ]);

            return $this->template->menuList;
        }
    }
