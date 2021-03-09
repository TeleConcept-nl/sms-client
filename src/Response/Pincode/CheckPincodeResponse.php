<?php
namespace Teleconcept\Sms\Client\Response\Pincode;

use DateTimeImmutable;
use Psr\Http\Message\ResponseInterface as Response;
use function date_create_immutable;
use function date_interval_create_from_date_string;
use function json_decode;

/**
 * Class CheckPincodeResponse
 * @package Teleconcept\Sms\Client\Response\Pincode
 */
class CheckPincodeResponse implements CheckPincodeResponseInterface
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
     * CheckPincodeResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
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
