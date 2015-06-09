<?php
    require_once('contentlessElement.php');

	class Element extends ContentlessElement {
		private $content;

		public function __construct ($tag) {
            parent::__construct($tag);

			$this->content = array();
		}

		public function createElement ($tag) {
			$element = new Element($tag);
			$this->content[] = $element;
			return $element;
		}

		public function createContentlessElement ($tag) {
			$element = new ContentlessElement($tag);
			$this->content[] = $element;
			return $element;
		}

        public function prepend (Content $content) {
            array_unshift($this->content, $content);
        }

        public function append (Content $content) {
            $this->content[] = $content;
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
