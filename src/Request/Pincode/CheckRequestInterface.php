<?php
namespace Teleconcept\Sms\Client\Request\Pincode;

use Teleconcept\Sms\Client\Request\RequestInterface;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Sms\Client\Request\Pincode
 */
interface CheckRequestInterface extends RequestInterface
{
    /**
     * @param int $outletId
     * @param string $shortCode
     * @param string $country
     * @param string $pincode
     * @param string $keyword
     * @return CheckRequestInterface
     */
    public function setRequiredParameters(
        int $outletId,
        string $shortCode,
        string $country,
        string $pincode,
        string $keyword
    ): CheckRequestInterface;
}
