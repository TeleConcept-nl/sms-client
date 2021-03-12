<?php
namespace Teleconcept\Sms\Client\Response\Pincode\Check;

use DateTimeImmutable;
use Teleconcept\Sms\Client\Response\BaseResponseInterface;

/**
 * Interface ResponseInterface
 * @package Teleconcept\Sms\Client\Response\Pincode
 */
interface ResponseInterface extends BaseResponseInterface
{
    /**
     * @return int
     */
    public function organizationId(): int;

    /**
     * @return string
     */
    public function reference(): string;

    /**
     * @return int
     */
    public function mobileOriginatorId(): int;

    /**
     * @return string
     */
    public function ipAddress(): string;

    /**
     * @return string
     */
    public function shortCode(): string;

    /**
     * @return string
     */
    public function keyword(): string;

    /**
     * @return string
     */
    public function pincode(): string;

    /**
     * @return DateTimeImmutable
     */
    public function createdAt(): DateTimeImmutable;

    /**
     * @return DateTimeImmutable
     */
    public function reportedAt(): DateTimeImmutable;

}
