<?php
namespace Forms;

use DateTime;
use Forms\Form\Abstractions\FormElement;

class FormElementProvider {
	private TextProvider $textProvider;

	/**
	 * @param TextProvider $textProvider
	 */
	public function __construct(TextProvider $textProvider) {
		$this->textProvider = $textProvider;
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Hidden
	 */
	public function hidden(array $fieldNamePath, string $caption, array $attributes = []): Form\Hidden {
		return new Form\Hidden($fieldNamePath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $title
	 * @param array $attributes
	 * @param FormElement ...$elements
	 * @return Form\LabelWithCheckbox
	 */
	public function labelWithCheckbox(array $fieldNamePath, string $title, array $attributes = [], FormElement ...$elements) {
		return new Form\LabelWithCheckbox($fieldNamePath, $title, $attributes, ...$elements);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Display
	 */
	public function display(array $fieldNamePath, string $caption, array $attributes = []): Form\Display {
		return new Form\Display($fieldNamePath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Checkbox
	 */
	public function checkbox(array $fieldNamePath, string $caption, array $attributes = []): Form\Checkbox {
		return new Form\Checkbox($fieldNamePath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePathPath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Input
	 */
	public function input(array $fieldNamePathPath, string $caption, array $attributes = []): Form\Input {
		return new Form\Input($fieldNamePathPath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePathPath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Money
	 */
	public function money(array $fieldNamePathPath, string $caption, array $attributes = []): Form\Money {
		return new Form\Money($fieldNamePathPath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Input
	 */
	public function email(array $fieldNamePath, string $caption, array $attributes = []): Form\Input {
		return new Form\Email($fieldNamePath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Textarea
	 */
	public function textarea(array $fieldNamePath, string $caption, array $attributes = []): Form\Textarea {
		return new Form\Textarea($fieldNamePath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $options
	 * @param array $attributes
	 * @return Form\Dropdown
	 */
	public function dropdown(array $fieldNamePath, string $caption, array $options = [], array $attributes = []): Form\Dropdown {
		$attributes['validation-messages']['Invalid selection'] = $attributes['validation-messages']['Invalid selection'] ?? $this->textProvider->translate('forms', 'Invalid selection');
		return new Form\Dropdown($fieldNamePath, $caption, $options, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\Password
	 */
	public function password(array $fieldNamePath, string $caption, array $attributes = []): Form\Password {
		return new Form\Password($fieldNamePath, $caption, $attributes);
	}

	/**
	 * @param array $fieldNamePath
	 * @param string $caption
	 * @param array $attributes
	 * @return Form\DateTimePicker
	 */
	public function unixDateTimePicker(array $fieldNamePath, string $caption, array $attributes = []): Form\DateTimePicker {
		return new Form\DateTimePicker($fieldNamePath, $caption, $attributes, static function (?int $value) {
			if($value === null || $value === 0) {
				return null;
			}
			return (new DateTime())->setTimestamp($value);
		});
	}
}
