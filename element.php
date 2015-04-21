<?php
	class Element extends Content {
		private $attributes;
		private $content;
		private $tag;

		public function Element ($tag, $class = false) {
			$this->attributes = array();
			$this->content = array();
			$this->tag = $tag;

            if ($class !== false) {
                $this->attributes['class'] = $class;
            }
		}

		public function addAttribute ($attribute, $value) {
			$this->attributes[$attribute] = $value;
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
