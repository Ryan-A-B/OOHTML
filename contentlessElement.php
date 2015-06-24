<?php
    require_once('content.php');

    if (!class_exists('ContentlessElement')) {
        class ContentlessElement extends Content {
            // Static Members and Functions
            protected static $customElements;
            protected static $defaultAttributes;

            public static function init () {
                static::$customElements = array();
                static::$defaultAttributes = array();
            }

            public static function createCustomElement ($custom_tag, $tag, array $defaultAttributes = array()) {
                static::$customElements[$custom_tag] = $tag;

                if (!empty($defaultAttributes)) {
                    static::addDefaultAttributes($custom_tag, $defaultAttributes);
                }
            }

            public static function addDefaultAttribute ($tag, $attribute, $value) {
                if (!isset(static::$defaultAttributes[$tag])) {
                    static::$defaultAttributes[$tag] = array();
                }

                if (is_null($value)) {
                    unset(static::$defaultAttributes[$tag][$attribute]);
                } else {
                    static::$defaultAttributes[$tag][$attribute] = $value;
                }
            }

            public static function addDefaultAttributes ($tag, array $attributes) {
                foreach ($attributes as $attribute => $value) {
                    static::addDefaultAttribute($tag, $attribute, $value);
                }
            }

            // Non-Static Members and Functions
            protected $attributes;
            protected $tag;

            public function __construct ($tag, array $attributes = array()) {
                if (isset(static::$defaultAttributes[$tag])) {
                    $attributes = array_merge(static::$defaultAttributes[$tag], $attributes);
                }

                if (isset(static::$customElements[$tag])) {
                    $tag = static::$customElements[$tag];
                }

                $this->attributes = $attributes;
                $this->tag = $tag;
            }

            public function __set ($attribute, $value) {
                if (is_null($value)) {
                    unset($this->attributes[$attribute]);
                } else {
                    $this->attributes[$attribute] = $value;
                }
            }

            public function generateHTML () {
                $html = "<{$this->tag}";
                foreach ($this->attributes as $attribute => $value) {
                    if (is_bool($value)) {
                        if ($value === true) {
                            $html .= " $attribute";
                        }
                    } else {
                        $html .= " $attribute='$value'";
                    }
                }
                $html .= '>';

                return $html;
            }
        }
        ContentlessElement::init();
    }
?>
