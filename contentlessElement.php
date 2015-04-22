<?php
    require_once('content.php');

	class ContentlessElement extends Content {
		protected $attributes;
		protected $tag;

		public function __construct ($tag, $class = false) {
			$this->attributes = array();
			$this->tag = $tag;

            if ($class !== false) {
                $this->attributes['class'] = $class;
            }
		}

		public function addAttribute ($attribute, $value) {
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
