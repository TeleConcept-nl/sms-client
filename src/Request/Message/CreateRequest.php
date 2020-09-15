<?php
namespace Teleconcept\Sms\Client\Request\Message;

use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Sms\Client\Exception\ValidationException;
use Teleconcept\Sms\Client\Request\Request;
use Teleconcept\Sms\Client\Response\ResponseInterface as Response;
use function filter_var;
use function GuzzleHttp\Psr7\stream_for;
use function is_array;
use function is_int;
use function json_encode;

/**
 * Class CreateRequest
 * @package Teleconcept\Sms\Client\Request\Message
 */
class CreateRequest extends Request implements CreateRequestInterface
{
    /**
     * CreateRequest constructor.
     * @param SmsClient $client
     * @param array $options
     */
    public function __construct(SmsClient $client, array $options = [])
    {
        parent::__construct('POST', '/messages');
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @param string $message
     * @param string $originator
     * @param array $recipients
     * @return CreateRequestInterface
     */
    final public function setRequiredParameters(
        string $message,
        string $originator,
        array $recipients
    ): CreateRequestInterface {
        return $this
            ->setOption('message', $message)
            ->setOption('originator', $originator)
            ->setOption('recipients', $recipients);
    }

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return CreateRequestInterface
     */
    final public function setScheduledAt(DateTimeImmutable $scheduledAt): CreateRequestInterface
    {
        return $this->setOption('scheduled-at', $scheduledAt->format('Y-m-d H:i:s'));
    }

    /**
     * @param string $webhook
     * @return CreateRequestInterface
     */
    final public function setWebHook(string $webhook): CreateRequestInterface
    {
        return $this->setOption('web-hook', $webhook);
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

        $body = stream_for(json_encode($this->options));
        $request = $this->withBody($body);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->sendMessage($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $headers = $this->headers;
        $errors = [];

        if ($headers['Authorization'] === null) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!is_int($headers['Organization'])) {
            $errors['organization'] = 'was not set.';
        } elseif ($headers['Organization'] < 1) {
            $errors['organization'] = 'was set but was invalid.';
        }

        if ($options['originator'] === null) {
            $errors['originator'] = 'was not set.';
        }

        if (isset($options['web-hook']) && !filter_var($options['report-url'], FILTER_VALIDATE_URL)) {
            $errors['webHook'] = 'was set but invalid url was supplied.';
        }

        if (!is_array($options['recipients'])) {
            $errors['recipients'] = 'was not supplied.';
        } elseif (empty($options['recipients'])) {
            $errors['recipients'] = 'was supplied but empty.';
        }

        return $errors;
    }
}
