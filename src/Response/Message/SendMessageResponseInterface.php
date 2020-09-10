<?php
namespace Teleconcept\Packages\Sms\Client\Response\Message;

use Teleconcept\Packages\Sms\Client\Response\ResponseInterface;

/**
 * Interface CreateResponseInterface
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface SendMessageResponseInterface extends ResponseInterface
{
    /**
     * @return array
     */
    public function messages(): array;
}
