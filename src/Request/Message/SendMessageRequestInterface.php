<?php
namespace Teleconcept\Packages\Sms\Client\Request\Message;

use DateTimeImmutable;
use Teleconcept\Packages\Sms\Client\Request\RequestInterface;
use Teleconcept\Packages\Sms\Client\Response\Message\SendMessageResponseInterface as MessageCreateResponse;

/**
 * Interface CreateRequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request\Message
 */
interface SendMessageRequestInterface extends RequestInterface
{
    /**
     * @param string $message
     * @param string $originator
     * @param array $recipients
     * @return SendMessageRequestInterface
     */
    public function setRequiredParameters(
        string $message,
        string $originator,
        array $recipients
    ): SendMessageRequestInterface;

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return SendMessageRequestInterface
     */
    public function setScheduledAt(DateTimeImmutable $scheduledAt): SendMessageRequestInterface;

    /**
     * @param string $webhook
     * @return SendMessageRequestInterface
     */
    public function setWebHook(string $webhook): SendMessageRequestInterface;

    /**
     * @return MessageCreateResponse
     */
    public function send(): MessageCreateResponse;
}
