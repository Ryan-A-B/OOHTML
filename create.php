<?php
    namespace oohtml;

    //if (!class_exists("Create", false)) {
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

            public static function __callStatic ($func, $args) {
                list($parent, $child, $item, $options) = call_user_func_array("static::$func", $args);

                self::applyOptions($item, $options);
                self::addToParent($parent, $child);
                
                return $item;
            }
        }
    //}
?>
