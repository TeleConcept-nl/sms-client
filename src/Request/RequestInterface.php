<?php
namespace Teleconcept\Packages\Sms\Client\Request;

use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;

/**
 * Interface RequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request
 */
interface RequestInterface
{
    /**
     * @param string $apiToken
     * @param int $outletId
     * @return RequestInterface
     */
    public function setAuthorization(string $apiToken, int $outletId): RequestInterface;

    /**
     * @param string $option
     * @param mixed $value
     * @return RequestInterface
     */
    public function setOption(string $option, $value): RequestInterface;

    /**
     * @return Response
     */
    public function send(): Response;
}
