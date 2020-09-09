<?php
namespace Teleconcept\Packages\Sms\Client\Response\Credit;

use DateTimeImmutable;
use function date_create_immutable;

/**
 * Class Message
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
class Purchase implements PurchaseInterface
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var int
     */
    private $available;

    /**
     * @var int
     */
    private $total;

    /**
     * Purchase constructor.
     * @param string $reference
     * @param string $total
     * @param string $available
     * @param string $createdAt
     */
    public function __construct(
        string $reference,
        string $total,
        string $available,
        string $createdAt
    ) {
        $this->reference = $reference;
        $this->total = $total;
        $this->available = $available;
        $this->createdAt = date_create_immutable($createdAt);
    }

    /**
     * @return string
     */
    final public function reference(): string
    {
        return $this->reference;
    }

    /**
     * @return int
     */
    final public function total(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    final public function available(): int
    {
        return $this->available;
    }

    /**
     * @return DateTimeImmutable
     */
    final public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
