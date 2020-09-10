<?php
namespace Teleconcept\Packages\Sms\Client\Request\Message;

use Teleconcept\Packages\Sms\Client\Request\RequestInterface;
use Teleconcept\Packages\Sms\Client\Response\Message\CheckMessageResponseInterface as CheckMessageResponse;

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

    /**
     * @return CheckMessageResponse
     */
    public function send(): CheckMessageResponse;
}
