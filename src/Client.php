<?php
namespace Teleconcept\Packages\Sms\Client;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package Teleconcept\Packages\Transaction\Ivr\Client
 */
class Client extends GuzzleClient implements ClientInterface
{
    /**
     * Client constructor.
     * @param $smsApiDomain
     */
    public function __construct(string $smsApiDomain)
    {
        parent::__construct(['base_uri' => $smsApiDomain]);
    }
}
