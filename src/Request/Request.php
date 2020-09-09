<?php
namespace Teleconcept\Packages\Sms\Client\Request;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Teleconcept\Packages\Sms\Client\ClientInterface as SmsClient;
use function array_key_exists;

/**
 * Class Request
 * @package Teleconcept\Packages\Sms\Client\Request
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
    protected $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => null,
        'Outlet' => null
    ];

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param string $apiToken
     * @param int $outletId
     * @return RequestInterface
     */
    final public function setAuthorization(string $apiToken, int $outletId): RequestInterface
    {
        $this->headers['Authorization'] = 'Bearer ' . $apiToken;
        $this->headers['Outlet'] = $outletId;

        return $this;
    }

    /**
     * @param string $option
     * @param mixed $value
     * @return RequestInterface
     */
    final public function setOption(string $option, $value): RequestInterface
    {
        if (array_key_exists($option, $this->options) && $this->options[$option] !== $value) {
            $this->options[$option] = $value;
        }

        return $this;
    }
}
