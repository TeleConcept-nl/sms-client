<?php
namespace Teleconcept\Sms\Client\Response\Credit\Check;

use Teleconcept\Sms\Client\Response\BaseResponseInterface;
use Teleconcept\Sms\Client\Response\Credit\PurchaseInterface as Purchase;

/**
 * Interface ResponseInterface
 * @package Teleconcept\Sms\Client\Response\Credit\Check
 */
interface ResponseInterface extends BaseResponseInterface
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
     * @return Purchase[]|array
     */
    public function purchases(): array;
}
