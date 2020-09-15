<?php
namespace Teleconcept\Sms\Client\Response\Credit;

use Teleconcept\Sms\Client\Response\ResponseInterface;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message
 */
interface CheckCreditResponseInterface extends ResponseInterface
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
