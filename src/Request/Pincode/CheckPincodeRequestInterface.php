<?php
namespace Teleconcept\Packages\Sms\Client\Request\Pincode;

use Teleconcept\Packages\Sms\Client\Request\RequestInterface;
use Teleconcept\Packages\Sms\Client\Response\Pincode\CheckPincodeResponseInterface;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request\Pincode
 */
interface CheckPincodeRequestInterface extends RequestInterface
{
    /**
     * @param string $outletId
     * @param string $shortCode
     * @param string $country
     * @param string $pincode
     * @param string $keyword
     * @return CheckPincodeRequestInterface
     */
    public function setRequiredParameters(
        string $outletId,
        string $shortCode,
        string $country,
        string $pincode,
        string $keyword
    ): CheckPincodeRequestInterface;

    /**
     * @return CheckPincodeResponseInterface
     */
    public function send(): CheckPincodeResponseInterface;
}
