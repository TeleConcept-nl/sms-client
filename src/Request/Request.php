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
    /**
     * @var SmsClient
     */
    protected $client;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => null,
        'Organization' => null
    ];

    /**
     * @param string $apiToken
     * @param int $organizationId
     * @return RequestInterface
     */
    final public function setAuthorization(string $apiToken, int $organizationId): RequestInterface
    {
        $this->headers['Authorization'] = 'Bearer ' . $apiToken;
        $this->headers['Organization'] = $organizationId;

        return $this;
    }

    /**
     * @param string $option
     * @param mixed $value
     * @return RequestInterface
     */
    final public function setOption(string $option, $value): RequestInterface
    {
        if (!array_key_exists($option, $this->options) || $this->options[$option] !== $value) {
            $this->options[$option] = $value;
        }

        return $this;
    }
}
