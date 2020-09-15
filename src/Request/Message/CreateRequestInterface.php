<?php
namespace Teleconcept\Sms\Client\Request\Message;

use DateTimeImmutable;
use Teleconcept\Sms\Client\Request\RequestInterface;

/**
 * Interface CreateRequestInterface
 * @package Teleconcept\Sms\Client\Request\Message
 */
interface CreateRequestInterface extends RequestInterface
{
    /**
     * @param string $message
     * @param string $originator
     * @param array $recipients
     * @return CreateRequestInterface
     */
    public function setRequiredParameters(
        string $message,
        string $originator,
        array $recipients
    ): CreateRequestInterface;

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return CreateRequestInterface
     */
    public function setScheduledAt(DateTimeImmutable $scheduledAt): CreateRequestInterface;

    /**
     * @param string $webhook
     * @return CreateRequestInterface
     */
    public function setWebHook(string $webhook): CreateRequestInterface;
}
