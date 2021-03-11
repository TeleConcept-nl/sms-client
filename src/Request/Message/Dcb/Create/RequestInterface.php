<?php
namespace Teleconcept\Sms\Client\Request\Message\Dcb\Create;

use DateTimeImmutable;
use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;

/**
 * Interface RequestInterface
 * @package Teleconcept\Sms\Client\Request\Message\Dcb\Create
 */
interface RequestInterface extends BaseRequestInterface
{
    /**
     * @param int $organizationId
     * @param string $message
     * @param string $originator
     * @param string $recipient
     * @return RequestInterface
     */
    public function setRequiredParameters(
        int $organizationId,
        string $message,
        string $originator,
        string $recipient
    ): RequestInterface;

    /**
     * @param string $reportUrl
     * @return RequestInterface
     */
    public function setReportUrl(string $reportUrl): RequestInterface;

    /**
     * @param string $authorizationToken
     * @return RequestInterface
     */
    public function setRequiredHeaders(string $authorizationToken): RequestInterface;
}
