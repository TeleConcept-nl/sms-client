<?php
namespace Teleconcept\Packages\Sms\Client\Response\Credit;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
interface CheckCreditResponseInterface
{
    /**
     * @return int
     */
    public function total(): int;

    /**
     * @return int
     */
    public function available(): int;

    /**
     * @return Purchase[]
     */
    public function purchases(): array;
}
