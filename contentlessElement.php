<?php
    require_once('content.php');

	class ContentlessElement extends Content {
		protected $attributes;
		protected $tag;

		public function __construct ($tag) {
			$this->attributes = array();
			$this->tag = $tag;
		}

        public function __set ($attribute, $value) {
            $this->attributes[$attribute] = $value;
        }

		public function generateHTML () {
			$html = "<{$this->tag}";
			while (list($attribute, $value) = each($this->attributes)) {
				$html .= " $attribute='$value'";
			}
			$html .= '>';

			return $html;
		}
	}
?>
