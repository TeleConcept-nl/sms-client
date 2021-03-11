<?php
namespace Teleconcept\Sms\Client\Request\Message\Normal\Check;

use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;

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
}
