<?php
	class PlainText extends Content {
		private $text;

		public function __construct (string $text) {
			$this->text = $text;
		}

		public function generateHTML () {
			return $this->text;
		}
	}
?>
