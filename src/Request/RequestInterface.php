<?php
namespace Teleconcept\Sms\Client\Request;

use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;

/**
 * Interface RequestInterface
 * @package Teleconcept\Sms\Client\Request
 */
interface RequestInterface extends \Psr\Http\Message\RequestInterface
{
    /**
     * @param string $apiToken
     * @param int $organizationId
     * @return RequestInterface
     */
    public function setAuthorization(string $apiToken, int $organizationId): RequestInterface;

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
