<?php
namespace Teleconcept\Packages\Sms\Client\Response\Message;

/**
 * Interface CreateResponseInterface
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface SendMessageResponseInterface
{
    /**
     * @return array
     */
    public function messages(): array;
}
