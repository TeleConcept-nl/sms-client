<?php
namespace Teleconcept\Sms\Client\Request\Pincode\Check;

use Teleconcept\Sms\Client\Request\RequestInterface as BaseRequestInterface;
use Teleconcept\Sms\Client\Response\Pincode\ResponseInterface as CheckPincodeResponse;

/**
 * Interface RequestInterface
 * @package Teleconcept\Sms\Client\Request\Pincode\Check
 */
interface RequestInterface extends BaseRequestInterface
{
    /**
     * @param int $outletId
     * @param string $shortCode
     * @param string $country
     * @param string $pincode
     * @param string $keyword
     * @return RequestInterface
     */
    public function setRequiredParameters(
        int $outletId,
        string $shortCode,
        string $country,
        string $pincode,
        string $keyword
    ): RequestInterface;

    /**
     * @param string $authorizationToken
     * @param int $organizationId
     * @return RequestInterface
     */
    public function setRequiredHeaders(string $authorizationToken, int $organizationId): RequestInterface;

    /**
     * @return CheckPincodeResponse
     */
    public function send(): CheckPincodeResponse;
}
