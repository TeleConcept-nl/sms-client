<?php
namespace Teleconcept\Sms\Client\Response\Message;

use Teleconcept\Sms\Client\Response\ResponseInterface;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message
 */
interface CheckMessageResponseInterface extends ResponseInterface
{
    /**
     * @return Message
     */
    public function message(): Message;
}
