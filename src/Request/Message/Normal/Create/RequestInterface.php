<?php
namespace Teleconcept\Sms\Client\Request\Message\Normal\Create;

use DateTimeImmutable;
use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;

/**
 * Interface CreateRequestInterface
 * @package Teleconcept\Sms\Client\Request\Message
 */
interface RequestInterface extends BaseRequestInterface
{
    /**
     * @param string $message
     * @param string $originator
     * @param array $recipients
     * @return RequestInterface
     */
    public function setRequiredParameters(string $message, string $originator, array $recipients): RequestInterface;

    /**
     * @param string $authorizationToken
     * @param int $organizationId
     * @return RequestInterface
     */
    public function setRequiredHeaders(string $authorizationToken, int $organizationId): RequestInterface;

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return RequestInterface
     */
    public function setScheduledAt(DateTimeImmutable $scheduledAt): RequestInterface;

    /**
     * @param string $reportUrl
     * @return RequestInterface
     */
    public function setReportUrl(string $reportUrl): RequestInterface;
}
