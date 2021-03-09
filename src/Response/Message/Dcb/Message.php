<?php
namespace Teleconcept\Sms\Client\Response\Message\Dcb;

/**
 * Class Message
 * @package Teleconcept\Sms\Client\Response\Message\Dcb
 */
class Message implements MessageInterface
{
    private string $reference;
    private string $status;
    private string $originator;
    private string $recipient;
    private string $operator;
    private string $body;

    /**
     * Message constructor.
     * @param string $reference
     * @param string $status
     * @param string $originator
     * @param string $recipient
     * @param string $operator
     * @param string $body
     */
    public function __construct(
        string $reference,
        string $status,
        string $originator,
        string $recipient,
        string $operator,
        string $body
    ) {
        $this->reference = $reference;
        $this->status = $status;
        $this->originator = $originator;
        $this->recipient = $recipient;
        $this->body = $body;
        $this->operator = $operator;
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
    final public function body(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    final public function operator(): string
    {
        return $this->operator;
    }
}
