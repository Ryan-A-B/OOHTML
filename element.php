<?php
    namespace oohtml;

    require_once('contentlessElement.php');

    if (!class_exists('Element', false)) {
        class Element extends ContentlessElement {
            protected static $customElements;
            protected static $defaultAttributes;

            private $content;

            public function __construct ($tag, array $attributes = array()) {
                parent::__construct($tag, $attributes);

                $this->content = array();
            }

            public function createElement ($tag, array $attributes = array()) {
                $element = new Element($tag, $attributes);
                $this->content[] = $element;
                return $element;
            }

            public function createContentlessElement ($tag, array $attributes = array()) {
                $element = new ContentlessElement($tag, $attributes);
                $this->content[] = $element;
                return $element;
            }

            public function prepend (Content $content) {
                array_unshift($this->content, $content);
            }

            public function append (Content $content) {
                $this->content[] = $content;
            }

            public function addContent ($content) {
                if (gettype($content) == "string") {
                    $content = new PlainText($content);
                }
                if (!is_subclass_of($content, 'oohtml\Content')) {
                    throw new \Exception("Content must be of type string or Content");
                }
                $this->content[] = $content;
            }

            public function generateHTML () {
                $html = parent::generateHTML();

                foreach ($this->content as $element) {
                    $html .= $element->generateHTML();
                }

                $html .= "</{$this->tag}>";

                return $html;
            }
        }
        Element::init();
    }
?>
