<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NumberVisit extends Constraint
{
    public $message = 'too much ticket on {{ date }} it was sold';
}
