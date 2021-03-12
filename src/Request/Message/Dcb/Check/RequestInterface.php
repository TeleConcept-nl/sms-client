<?php
namespace Teleconcept\Sms\Client\Request\Message\Dcb\Check;

use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;
use Teleconcept\Sms\Client\Response\Message\Dcb\Check\ResponseInterface as CheckDcbMessageResponse;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Sms\Client\Request\Message
 */
interface RequestInterface extends BaseRequestInterface
{
    /**
     * @param string $reference
     * @return RequestInterface
     */
    public function setReference(string $reference): RequestInterface;

    /**
     * @param string $authorizationToken
     * @return RequestInterface
     */
    public function setRequiredHeaders(string $authorizationToken): RequestInterface;

    /**
     * @return CheckDcbMessageResponse
     */
    public function send(): CheckDcbMessageResponse;
}
