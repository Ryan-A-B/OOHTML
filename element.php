<?php
    require_once('contentlessElement.php');

	class Element extends ContentlessElement {
		private $content;

		public function __construct ($tag, $class = false) {
            parent::__construct($tag, $class);

			$this->content = array();
		}

		public function createElement ($tag, $class = false) {
			$element = new Element($tag, $class);
			$this->content[] = $element;
			return $element;
		}

		public function createContentlessElement ($tag, $class = false) {
			$element = new ContentlessElement($tag, $class);
			$this->content[] = $element;
			return $element;
		}

		public function addContent (Content $content) {
			$this->content[] = $content;
		}

		public function generateHTML () {
			$html = "<{$this->tag}";
			while (list($attribute, $value) = each($this->attributes)) {
				$html .= " $attribute='$value'";
			}
			$html .= '>';

			foreach ($this->content as $element) {
				$html .= $element->generateHTML();
			}

			$html .= "</{$this->tag}>";

			return $html;
		}
	}
?>
