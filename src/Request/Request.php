<?php
namespace Teleconcept\Sms\Client\Request;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use function array_key_exists;

/**
 * Class Request
 * @package Teleconcept\Sms\Client\Request
 */
abstract class Request extends Psr7Request implements RequestInterface
{
    protected SmsClient $client;
    protected array $options = [];
    protected array $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => null,
        'Organization' => null
    ];

    /**
     * @param string $header
     * @param $value
     * @return RequestInterface
     */
    final public function setHeader(string $header, string $value): RequestInterface
    {
        if (array_key_exists($header, $this->headers) && $this->headers[$header] !== $value) {
            $this->headers[$header] = $value;
        }

        return $this;
    }

    /**
     * @param string $option
     * @param mixed $value
     * @return RequestInterface
     */
    final public function setOption(string $option, string $value): RequestInterface
    {
        if (!array_key_exists($option, $this->options) || $this->options[$option] !== $value) {
            $this->options[$option] = $value;
        }

        return $this;
    }
}
