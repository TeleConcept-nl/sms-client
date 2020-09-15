<?php
namespace Teleconcept\Sms\Client\Request\Message;

use Teleconcept\Sms\Client\Request\RequestInterface;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Sms\Client\Request\Message
 */
interface CheckRequestInterface extends RequestInterface
{
    /**
     * @param string $reference
     * @return CheckRequestInterface
     */
    public function setReference(string $reference): CheckRequestInterface;
}
