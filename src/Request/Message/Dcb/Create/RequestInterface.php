<?php
namespace Teleconcept\Sms\Client\Request\Message\Dcb\Create;

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
    public function setRequiredParameters(
        string $message,
        string $originator,
        array $recipients
    ): RequestInterface;

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return RequestInterface
     */
    public function setScheduledAt(DateTimeImmutable $scheduledAt): RequestInterface;

    /**
     * @param string $webhook
     * @return RequestInterface
     */
    public function setWebHook(string $webhook): RequestInterface;
}
