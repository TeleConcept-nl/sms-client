<?php
namespace Teleconcept\Sms\Client\Response\Message\Normal;

use DateTimeImmutable;
use function date_create_immutable;

/**
 * Class Message
 * @package Teleconcept\Sms\Client\Response\Message\Normal
 */
class Message implements MessageInterface
{
    private int $texts;

    private string $reference;
    private string $status;
    private string $originator;
    private string $recipient;
    private string $encoding;
    private string $body;

    private DateTimeImmutable $scheduledAt;

    /**
     * Message constructor.
     * @param string $reference
     * @param string $status
     * @param string $originator
     * @param string $recipient
     * @param string $encoding
     * @param string $body
     * @param string $scheduledAt
     * @param int $texts
     */
    public function __construct(
        string $reference,
        string $status,
        string $originator,
        string $recipient,
        string $encoding,
        string $body,
        string $scheduledAt,
        int $texts
    ) {
        $this->reference = $reference;
        $this->status = $status;
        $this->originator = $originator;
        $this->recipient = $recipient;
        $this->encoding = $encoding;
        $this->body = $body;
        $this->scheduledAt = date_create_immutable($scheduledAt);
        $this->texts = $texts;
    }

    /**
     * @return string
     */
    final public function reference(): string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    final public function status(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    final public function originator(): string
    {
        return $this->originator;
    }

    /**
     * @return string
     */
    final public function recipient(): string
    {
        return $this->recipient;
    }

    /**
     * @return string
     */
    final public function encoding(): string
    {
        return $this->encoding;
    }

    /**
     * @return string
     */
    final public function body(): string
    {
        return $this->body;
    }

    /**
     * @return DateTimeImmutable|null
     */
    final public function scheduledAt(): ?DateTimeImmutable
    {
        return $this->scheduledAt ?? null;
    }

    /**
     * @return int
     */
    final public function texts(): int
    {
        return $this->texts;
    }
}
