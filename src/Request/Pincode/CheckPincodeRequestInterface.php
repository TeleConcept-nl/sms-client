<?php
namespace Teleconcept\Packages\Sms\Client\Request\Pincode;

use Teleconcept\Packages\Sms\Client\Request\RequestInterface;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request\Pincode
 */
interface CheckPincodeRequestInterface extends RequestInterface
{
    /**
     * @param int $outletId
     * @param string $shortCode
     * @param string $country
     * @param string $pincode
     * @param string $keyword
     * @return CheckPincodeRequestInterface
     */
    public function setRequiredParameters(
        int $outletId,
        string $shortCode,
        string $country,
        string $pincode,
        string $keyword
    ): CheckPincodeRequestInterface;
}
