<?php
namespace Teleconcept\Sms\Client\Request\Message\Normal\Check;

use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;
use Teleconcept\Sms\Client\Response\Message\Normal\Check\ResponseInterface as CheckNormalMessageResponse;

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
     * @param int $organizationId
     * @return RequestInterface
     */
    public function setRequiredHeaders(string $authorizationToken, int $organizationId): RequestInterface;

    /**
     * @return CheckNormalMessageResponse
     */
    public function send(): CheckNormalMessageResponse;
}
