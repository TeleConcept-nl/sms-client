<?php
namespace Teleconcept\Sms\Client\Response\Message;

use Teleconcept\Sms\Client\Response\ResponseInterface;

/**
 * Interface CreateResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message
 */
interface SendMessageResponseInterface extends ResponseInterface
{
    /**
     * @return array
     */
    public function messages(): array;
}
