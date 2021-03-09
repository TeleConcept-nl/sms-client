<?php
namespace Teleconcept\Sms\Client\Request\Credit\Check;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Sms\Client\Exception\ValidationException;
use Teleconcept\Sms\Client\Request\Request as BaseRequest;
use Teleconcept\Sms\Client\Response\Credit\CheckCreditResponse;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use function is_int;
use function is_string;

/**
 * Class Request
 * @package Teleconcept\Sms\Client\Request\Credit\Check
 */
class Request extends BaseRequest implements RequestInterface
{
    /**
     * CreateRequest constructor.
     * @param SmsClient $client
     * @param array $options
     */
    public function __construct(SmsClient $client, array $options = [])
    {
        parent::__construct('GET', '/credits');
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @return Response
     * @throws GuzzleException
     * @throws ValidationException
     */
    final public function send(): Response
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $uri = new Uri('/credits');
        $request = $this->withUri($uri);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->checkCredit($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $headers = $this->headers;
        $errors = [];

        if (!is_string($headers['Authorization'])) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!is_int($headers['Organization'])) {
            $errors['organization'] = 'was not set.';
        } elseif ($headers['Organization'] < 1) {
            $errors['organization'] = 'was set but was invalid.';
        }

        return $errors;
    }
}
