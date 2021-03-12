<?php
namespace Teleconcept\Sms\Client\Request\Credit\Check;

use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;
use Teleconcept\Sms\Client\Response\Credit\Check\ResponseInterface as CheckCreditResponse;

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

    /**
     * @return CheckCreditResponse
     */
    public function send(): CheckCreditResponse;
}
