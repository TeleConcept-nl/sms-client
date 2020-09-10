<?php
namespace Teleconcept\Packages\Sms\Client\Request\Message;

use DateTimeImmutable;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Packages\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Packages\Sms\Client\Exception\ValidationException;
use Teleconcept\Packages\Sms\Client\Request\Request;
use Teleconcept\Packages\Sms\Client\Response\Error\NotFoundResponse;
use Teleconcept\Packages\Sms\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\SendMessageResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\SendMessageResponseInterface;
use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;
use function filter_var;
use function GuzzleHttp\Psr7\stream_for;
use function is_array;
use function is_int;
use function json_encode;

/**
 * Class CreateRequest
 * @package Teleconcept\Packages\Sms\Client\Request\Message
 */
class SendMessageRequest extends Request implements SendMessageRequestInterface
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
     * @return SendMessageRequestInterface
     */
    final public function setRequiredParameters(
        string $message,
        string $originator,
        array $recipients
    ): SendMessageRequestInterface {
        return $this
            ->setOption('message', $message)
            ->setOption('originator', $originator)
            ->setOption('recipients', $recipients);
    }

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return SendMessageRequestInterface
     */
    final public function setScheduledAt(DateTimeImmutable $scheduledAt): SendMessageRequestInterface
    {
        return $this->setOption('scheduled-at', $scheduledAt->format('Y-m-d H:i:s'));
    }

    /**
     * @param string $webhook
     * @return SendMessageRequestInterface
     */
    final public function setWebHook(string $webhook): SendMessageRequestInterface
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
