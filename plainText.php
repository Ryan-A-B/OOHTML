<?php
	class PlainText extends Content {
		private $text;

		public function __construct ($text) {
            if (!is_string($text) && !is_null($text)) {
                throw new Exception('PlainText __construct expects string');
            }
			$this->text = $text;
		}

		public function generateHTML () {
			return $this->text;
		}
	}
?>
