<?php
    namespace oohtml\bootstrap;

    if (!class_exists("Create", false)) {
        class Create {
            private static function applyOptions ($item, $elementOptions) {
                foreach ($elementOptions as $element => $options) {
                    foreach ($options as $option => $value) {
                        if ($option == "class") {
                            $item->$element->$option = "{$item->$element->$option} $value";
                        } else {
                            $item->$element->$option = $value;
                        }
                    }
                }
            }

            private static function addToParent ($parent, $item) {
                if (!is_null($parent)) {
                    $parent->addContent($item);
                }
            }

            private static function panel ($title, \oohtml\Element $parent = null, $userOptions = array()) {
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

            public static function __callStatic ($func, $args) {
                list($parent, $child, $item, $options) = call_user_func_array("self::$func", $args);

                self::applyOptions($item, $options);
                self::addToParent($parent, $child);
                
                return $item;
            }
        }
    }
?>
