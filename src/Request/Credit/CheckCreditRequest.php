<?php
namespace Teleconcept\Packages\Sms\Client\Request\Credit;

use GuzzleHttp\Psr7\Uri;
use Teleconcept\Packages\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Packages\Sms\Client\Exception\ValidationException;
use Teleconcept\Packages\Sms\Client\Request\Request;
use Teleconcept\Packages\Sms\Client\Response\Message\CheckCreditResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\CheckCreditResponseInterface;
use function is_int;
use function is_string;

/**
 * Class CheckCreditRequest
 * @package Teleconcept\Packages\Sms\Client\Request\Credit
 */
class CheckCreditRequest extends Request implements CheckCreditRequestInterface
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
     * @return CheckMessageResponseInterface
     * @throws GuzzleException
     * @throws ValidationException
     */
    final public function send(): CheckMessageResponseInterface
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

        $response = $this->client->send($request);

        return new CheckCreditResponse($response);
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
