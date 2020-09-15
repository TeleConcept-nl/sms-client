<?php
namespace Teleconcept\Sms\Client\Exception;

use Exception;
use function implode;

/**
 * Class ValidationException
 * @package Teleconcept\Sms\Client\Exception
 */
class ValidationException extends Exception
{
    public function __construct(array $errors)
    {
        $messages = [];

        foreach ($errors as $param => $error) {
            $messages[] = $param . ': ' . $error;
        }

        parent::__construct(implode(PHP_EOL, $messages));
    }
}
