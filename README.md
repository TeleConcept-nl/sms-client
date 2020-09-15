
#Create And Check Message

```
//Start creation
$client = new \Teleconcept\Sms\Client\Client('https://sms-api.teleconcept.nl');
$request = new \Teleconcept\Sms\Client\Request\Message\CreateRequest($client);

$request
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->setRequiredParameters('This is a message', 'Sender name', ['0612345678'])
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135);

$response = $request->send();
$messages = $response->messages();
$message = $messages[0];

echo $message->reference(); // string uuidv4
echo $message->status(); // current status of the message
echo $message->originator(); // sender name  
echo $message->recipient(); // recipient telephone number
echo $message->encoding(); // encoding
echo $message->body(); // the message
echo $message->scheduledAt(); // when will it be sent
echo $message->texts(); // number of credits used to send this message
```

```
$client = new \Teleconcept\Sms\Client\Client('https://sms-api.teleconcept.nl');
$request = new \Teleconcept\Sms\Client\Request\Message\CheckRequest($client);


$response = $request
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->setReference('b5638234-8623-42d0-8c8a-b91a50191788')
    ->send();

$message = $response->message();
echo $message->reference(); // string uuidv4
echo $message->status(); // current status of the message
echo $message->originator(); // sender name  
echo $message->recipient(); // recipient telephone number
echo $message->encoding(); // encoding
echo $message->body(); // the message
echo $message->scheduledAt(); // when will it be sent
echo $message->texts(); // number of credits used to send this message
```


#Check Credit
```
$client = new \Teleconcept\Sms\Client\Client('https://sms-api.teleconcept.nl');
$request = new \Teleconcept\Sms\Client\Request\Credit\CheckRequest($client);

$response = $request
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->send();

echo $response->total(); //All the credits you ever bought
echo $response->available(); //All the unspent credits you have left
 
$purchases = $response->purchases();
$purchase = $purchases[0];

echo $purchase->reference(); // reference of the purchase
echo $purchase->total(); // number of credits purchased
echo $purchase->available(); // number of unspent credits left
echo $purchase->createdAt(); // date and time of purchase

```

#Check Pincode

```
$client = new \Teleconcept\Sms\Client\Client('https://sms-api.teleconcept.nl');
$request = new \Teleconcept\Sms\Client\Request\Pincode\CheckRequest($client);

$response = $request
    ->setRequiredParameters(154135, '3010', '31', '123456', 'HALLO')
    ->setAuthorization('40924ec10f3aaed662fe62aac', 154135)
    ->send();

echo $response->organizationId();
echo $response->reference(); 
echo $response->mobileOriginatorId(); 
echo $response->ipAddress(); 
echo $response->shortCode(); 
echo $response->keyword(); 
echo $response->pincode(); 
echo $response->createdAt(); 
echo $response->reportedAt();
```
