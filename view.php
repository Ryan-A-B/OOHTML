<?php
    namespace oohtml;

    require_once('element.php');
    require_once('contentlessElement.php');
    require_once('plainText.php');

    if (!class_exists('View', false)) {
        class View {
            private static $html;

            public static $styleFolder;
            public static $scriptFolder;

            public static $head;
            public static $body;
            public static $foot;

            public static function init () {
                self::$html = new Element('html');

                self::$head = self::$html->createElement('head');
                self::$body = self::$html->createElement('body');
                self::$foot = new Element('footer');
            }

            public static function addStyle ($style) {
                $tmp = self::$head->createContentlessElement('link');
                $tmp->rel = 'stylesheet';
                $tmp->href = self::$styleFolder . $style . '.css';
            }
            
            public static function addScript ($script) {
                $tmp = self::$foot->createElement('script');
                $tmp->type = 'text/javascript';
                $tmp->src = self::$scriptFolder . $script . '.js';
            }
            
            public static function render () {
                self::$body->addContent(self::$foot);

                echo ('<!doctype html>');
                echo self::$html->generateHTML();
            }
        }
        View::init();
    }
?>
