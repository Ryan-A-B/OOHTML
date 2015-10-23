<?php
    namespace oohtml\bootstrap;

    class Tabs extends \oohtml\Template {
        private $useFadeEffect;
        private $numTabs = 0;

        public function __construct ($useFadeEffect = true) {
            $this->useFadeEffect = $useFadeEffect;

            $base = new \oohtml\Element("div");

            $tabs = $base->createElement("ul", [
                "class" => "nav nav-tabs",
                "role" => "tablist"
            ]);

            $panes = $base->createElement("div", ["class" => "tab-content"]);

            $this->template = (object)compact("base", "tabs", "panes");
        }

        public function addTab ($id, $name) {
            $tab = $this->template->tabs->createElement("li", ["role" => "presentation"]);

            $link = $tab->createElement("a", [
                "href" => "#$id",
                "aria-controls" => "$id",
                "role" => "tab",
                "data-toggle" => "tab"
            ]);
            $link->addContent($name);

            $pane = $this->template->panes->createElement("div", [
                "id" => $id,
                "class" => "tab-pane" . ($this->useFadeEffect ? " fade" : ""),
                "role" => "tabpanel"
            ]);

            if (!$this->numTabs) {
                $tab->class = "active";
                $pane->class = "$pane->class active" . ($this->useFadeEffect ? " in" : "");
            }
            $this->numTabs++;
            return [$tab, $link, $pane];
        }
    }
