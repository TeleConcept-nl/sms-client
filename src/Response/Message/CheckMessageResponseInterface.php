<?php
namespace Teleconcept\Packages\Sms\Client\Response\Message;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface CheckMessageResponseInterface
{
    /**
     * @return Message
     */
    public function message(): Message;
}
