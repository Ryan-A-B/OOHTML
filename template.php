<?php
    namespace oohtml;

    abstract class Template extends Element {
        public $template;

        public $options = [];

        public function generateHTML() {
            foreach ($this->options as $element => $settings) {
                $element = $this->template->$element;
                foreach ($settings as $setting => $value) {
                    if ($setting == "class") {
                        $element->$setting = "{$element->$setting} $value";
                    } else {
                        $element->$setting = $value;
                    }
                }
            }

            return current((array)$this->template)->generateHTML();
        }
    }
