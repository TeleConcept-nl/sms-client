<?php
namespace Teleconcept\Packages\Sms\Client\Response\Credit;

use DateTimeImmutable;

/**
 * Class Message
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface PurchaseInterface
{
    /**
     * @return string
     */
    public function reference(): string;

    /**
     * @return int
     */
    public function total(): int;

    /**
     * @return int
     */
    public function available(): int;

    /**
     *
     * @return DateTimeImmutable
     */
    public function createdAt(): DateTimeImmutable;
}
