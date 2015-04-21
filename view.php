<?php
    require_once('plainText.php');

    class View {
        public static $content = array();

        public static $styleFolder;
        public static $scriptFolder;
        public static $title;

        public static $head;
        public static $body;
        public static $foot;

        public static function addStyle ($style) {
            $tmp = self::$head->createContentlessElement('link');
            $tmp->addAttribute('rel', 'stylesheet');
            $tmp->addAttribute('href', self::$styleFolder . $style . '.css');
        }
        
        public static function addScript ($script) {
            $tmp = self::$foot->createElement('script');
            $tmp->addAttribute('type', 'text/javascript');
            $tmp->addAttribute('src', self::$scriptFolder . $script . '.js');
        }
        
        public static function render ($view) {
            foreach (self::$content as $element) {
                echo $element->generateHTML();
            }
        }
    }

    View::$content[] = new PlainText('<!doctype html>');
    
    $html = new Element('html');
    View::$content[] = $html;

    View::$head = $html->createElement('head');
    View::$body = $html->createElement('body');
    View::$foot = $html->createElement('footer');
?>
