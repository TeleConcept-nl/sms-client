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
     * @param string $option
     * @param string $value
     * @return RequestInterface
     */
    public function setOption(string $option, string $value): RequestInterface;

    /**
     * @param string $header
     * @param string $value
     * @return RequestInterface
     */
    public function setHeader(string $header, string $value): RequestInterface;
}
