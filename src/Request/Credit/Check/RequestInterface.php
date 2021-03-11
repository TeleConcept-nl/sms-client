<?php
namespace Teleconcept\Sms\Client\Request\Credit\Check;

use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;

/**
 * Interface RequestInterface
 * @package Teleconcept\Sms\Client\Request\Credit\Check
 */
interface RequestInterface extends BaseRequestInterface
{
    /**
     * @param string $authorizationToken
     * @param int $organizationId
     * @return RequestInterface
     */
    public function setRequiredHeaders(string $authorizationToken, int $organizationId): RequestInterface;
}
