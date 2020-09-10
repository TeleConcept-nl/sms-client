<?php
namespace Teleconcept\Packages\Sms\Client\Response\Message;

use Teleconcept\Packages\Sms\Client\Response\ResponseInterface;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface CheckMessageResponseInterface extends ResponseInterface
{
    /**
     * @return Message
     */
    public function message(): Message;
}
