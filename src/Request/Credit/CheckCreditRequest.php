<?php
namespace Teleconcept\Packages\Sms\Client\Request\Credit;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Packages\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Packages\Sms\Client\Exception\ValidationException;
use Teleconcept\Packages\Sms\Client\Request\Request;
use Teleconcept\Packages\Sms\Client\Response\Credit\CheckCreditResponse;
use Teleconcept\Packages\Sms\Client\Response\Credit\CheckCreditResponseInterface;
use Teleconcept\Packages\Sms\Client\Response\Error\NotFoundResponse;
use Teleconcept\Packages\Sms\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;
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
     * @return CheckCreditResponse|
     * @throws ValidationException
     * @throws GuzzleException
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

        try {
            $response = $this->client->send($request);
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            if ($response && $response->getStatusCode() === 404) {
                return new NotFoundResponse($response);
            }
            if ($response && $response->getStatusCode() === 401) {
                return new UnauthorizedResponse($response);
            }
            throw $exception;
        }

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
