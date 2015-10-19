<?php
    namespace oohtml\bootstrap;

    if (!class_exists("Create", false)) {
        class Create extends \oohtml\Create {
            protected static function panel ($title, \oohtml\Element $parent = null, array $userOptions = array()) {
                $defaultOptions = [
                    "panel" => [
                        "class" => "panel-default"
                    ],
                    "heading" => [],
                    "title" => [],
                    "body" => []
                ];

                $elementOptions = [];
                foreach ($defaultOptions as $element => $ignore) {
                    if (!is_array($userOptions[$element])) {
                        $elementOptions[$element] = $defaultOptions[$element];
                        continue;
                    }

                    $elementOptions[$element] = array_merge($defaultOptions[$element], $userOptions[$element]);
                }

                $panel = new \StdClass();

                $panel->panel = new \oohtml\Element("div", [
                    "class" => "panel"
                ]);

                $panel->heading = $panel->panel->createElement("div", [
                    "class" => "panel-heading"
                ]);

                $panel->title = $panel->heading->createElement("h3", [
                    "class" => "panel-title"
                ]);
                $panel->title->addContent($title);

                $panel->body = $panel->panel->createElement("div", [
                    "class" => "panel-body"
                ]);

                return [$parent, $panel->panel, $panel, $elementOptions];
            }

            protected static function modal (\oohtml\Element $parent = null, array $userOptions = array()) {
                $modal = new \StdClass();

                $modal->modal = new \oohtml\Element("div", [
                    "class" => "modal fade"
                ]);

                $modal->dialog = $modal->modal->createElement("div", [
                    "class" => "modal-dialog"
                ]);

                $modal->content = $modal->dialog->createElement("div", [
                    "class" => "modal-content"
                ]);

                return [$parent, $modal->modal, $modal, $userOptions];
            }
        }
    }
?>
