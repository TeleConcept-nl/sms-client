<?php
namespace Teleconcept\Sms\Client\Response\Pincode\Check;

use DateTimeImmutable;
use function date_create_immutable;
use function json_decode;

/**
 * Class CheckPincodeResponse
 * @package Teleconcept\Sms\Client\Response\Pincode
 */
class Response implements ResponseInterface
{
    private int $organizationId;
    private int $mobileOriginatorId;

    private string $reference;
    private string $ipAddress;
    private string $shortCode;
    private string $keyword;
    private string $pincode;

    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $reportedAt;

    /**
     * Response constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        $data = $content['data'];
        $this->organizationId = $data['organization-id'];
        $this->mobileOriginatorId = $data['mobile-originator-id'];
        $this->reference = $data['reference'];
        $this->ipAddress = $data['ip-address'];
        $this->shortCode = $data['short-code'];
        $this->keyword = $data['keyword'];
        $this->pincode = $data['pincode'];
        $this->createdAt = date_create_immutable($data['created-at']);
        $this->reportedAt = date_create_immutable($data['reported-at']);
    }

    /**
     * @inheritDoc
     */
    final public function organizationId(): int
    {
        return $this->organizationId;
    }

    /**
     * @inheritDoc
     */
    final public function reference(): string
    {
        return $this->reference;
    }

    /**
     * @inheritDoc
     */
    final public function mobileOriginatorId(): int
    {
        return $this->mobileOriginatorId;
    }

    /**
     * @inheritDoc
     */
    final public function ipAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @inheritDoc
     */
    final public function shortCode(): string
    {
        return $this->shortCode;
    }

    /**
     * @inheritDoc
     */
    final public function keyword(): string
    {
        return $this->keyword;
    }

    /**
     * @inheritDoc
     */
    final public function pincode(): string
    {
        return $this->pincode;
    }

    /**
     * @inheritDoc
     */
    final public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @inheritDoc
     */
    final public function reportedAt(): DateTimeImmutable
    {
        return $this->reportedAt;
    }
}
