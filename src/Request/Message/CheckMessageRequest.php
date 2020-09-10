<?php
namespace Teleconcept\Packages\Sms\Client\Request\Message;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Packages\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Packages\Sms\Client\Exception\ValidationException;
use Teleconcept\Packages\Sms\Client\Request\Request;
use Teleconcept\Packages\Sms\Client\Response\Error\NotFoundResponse;
use Teleconcept\Packages\Sms\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\CheckMessageResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\CheckMessageResponseInterface;
use function GuzzleHttp\Psr7\stream_for;
use function is_int;
use function is_string;
use function json_encode;
use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;
/**
 * Class CheckRequest
 * @package Teleconcept\Packages\Sms\Client\Request\Message
 */
class CheckMessageRequest extends Request implements CheckMessageRequestInterface
{
    /**
     * CreateRequest constructor.
     * @param SmsClient $client
     * @param array $options
     */
    public function __construct(SmsClient $client, array $options = [])
    {
        parent::__construct('GET', '/messages');
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    final public function setReference(string $reference): CheckMessageRequestInterface
    {
        return $this->setOption('reference', $reference);
    }

    /**
     * @return Response
     * @throws ValidationException
     * @throws GuzzleException
     */
    final public function send(): Response
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $body = stream_for(json_encode($this->options));
        $uri = new Uri('/messages/'. $this->options['reference']);
        $request = $this
            ->withUri($uri)
            ->withBody($body);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->checkMessage($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
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

        if (!isset($options['reference'])) {
            $errors['reference'] = 'was not set.';
        }

        return $errors;
    }
}
