<?php

namespace rainwaves\PaygatePayment\Form;

class FormBuilder
{
    public static function buildForm(array $formFields, string $action): string
    {
        ob_start();
        include 'form_template.php';
        return ob_get_clean();
    }
}