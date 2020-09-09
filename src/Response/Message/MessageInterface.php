<?php
namespace Teleconcept\Packages\Sms\Client\Response\Message;

use DateTimeImmutable;

/**
 * Class Message
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function reference(): string;

    /**
     * @return string
     */
    public function status(): string;

    /**
     * @return string
     */
    public function originator(): string;

    /**
     * @return string
     */
    public function recipient(): string;

    /**
     * @return string
     */
    public function encoding(): string;

    /**
     * @return string
     */
    public function body(): string;

    /**
     * @return DateTimeImmutable|null
     */
    public function scheduledAt(): ?DateTimeImmutable;

    /**
     * @return int
     */
    public function texts(): int;
}
