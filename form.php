<?php
    require_once('element.php');

    if (!class_exists('Form')) {
        class Form {
            private static $formDefaults;

            public $form;

            public function init () {
                $formDefaults = array();
            }

            public function __construct (array $attributes) {
                $form = new Element('form');

                //Add default attributes for unset attributes
                foreach (self::$formDefaults as $attribute => $value) {
                    if (!isset($attributes[$attribute])) {
                        $attributes[$attribute] = $value;
                    }
                }

                //Apply attributes to form
                foreach ($attributes as $attribute => $value) {
                    $form->$attribute = $value;
                }
            }

            public static function setDefault($attribute, $value) {
                if ($value == null) {
                    unset(self::$formDefaults[$attribute]);
                } else {
                    self::$formDefaults[$attribute] = $value;
                }
            }

            public static function setDefaults(array $attributes) {
                foreach ($attributes as $attribute => $value) {
                    self::setDefault($attribute, $value);
                }
            }
        }
        Form::init();
    }
?>
