<?php
	class PlainText extends Content {
		private $text;

		public function PlainText ($text) {
			$this->text = $text;
		}

		public function generateHTML () {
			return $this->text;
		}
	}
?>
