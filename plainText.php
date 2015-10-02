<?php
    namespace oohtml;

    if (!class_exists('PlainText', false)) {
        class PlainText extends Content {
            private $text;

            public function __construct ($text) {
                $this->text = $text;
            }

            public function generateHTML () {
                return $this->text;
            }
        }
    }
?>
