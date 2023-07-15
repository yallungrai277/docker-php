<?php

namespace http\forms\notes;

use core\Validator;
use http\forms\BaseForm;

class NotesForm extends BaseForm
{
    /**
     * {@inheritDoc}
     */
    protected function performValidation(array $attributes): void
    {
        if (!Validator::string($_POST['title'], 1, 100)) {
            $this->errors['title'] = 'The title must be between 1 to 100 characters';
        }

        if (!Validator::string($_POST['body'], 1, 1000)) {
            $this->errors['body'] = 'The body must be between 1 to 255 characters.';
        }
    }
}
