<?php
namespace Teleconcept\Packages\Sms\Client\Request\Message;

use Teleconcept\Packages\Sms\Client\Request\RequestInterface;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request\Message
 */
interface CheckMessageRequestInterface extends RequestInterface
{
    /**
     * @param string $reference
     * @return CheckMessageRequestInterface
     */
    public function setReference(string $reference): CheckMessageRequestInterface;
}
