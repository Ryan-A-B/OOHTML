<?php
    namespace oohtml\bootstrap;

    if (!class_exists("Create", false)) {
        class Create {
            public static function panel ($title, Element $parent = null, $options = array()) {
                $defaultOptions = [
                    "panelClass" => "panel-default",
                    "titleClass" => ""
                ];

                $options = (object)array_merge($defaultOptions, $options);

                $panel = new StdClass();

                $panel->panel = new Element("div", [
                    "class" => "panel $options->panelClass"
                ]);

                $panel->heading = $panel->panel->createElement("div", [
                    "class" => "panel-heading"
                ]);

                $panel->title = $panel->heading->createElement("h3", [
                    "class" => "panel-title $options->titleClass"
                ]);
                $panel->title->addContent(new PlainText($title));

                $panel->body = $panel->panel->createElement("div", [
                    "class" => "panel-body"
                ]);

                if (!is_null($parent)) {
                    $parent->addContent($panel->panel);
                }

                return $panel;
            }
        }
    }
?>
