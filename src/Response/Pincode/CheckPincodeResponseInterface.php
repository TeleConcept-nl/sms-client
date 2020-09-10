<?php
namespace Teleconcept\Packages\Sms\Client\Response\Pincode;

use DateTimeImmutable;

/**
 * Interface CheckPincodeResponse
 * @package Teleconcept\Packages\Sms\Client\Response\Pincode
 */
interface CheckPincodeResponseInterface
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
