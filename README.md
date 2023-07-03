# PayGate Payment Package

The PayGate Payment Package provides a convenient way to integrate with the PayGate payment gateway for processing online payments.

## Installation

You can install the PayGate Payment Package via Composer. Run the following command in your project directory:

```shell
composer require rainwaves/paygate-payment

Configuration
After installing the package, you need to configure it with your PayGate credentials. Create a configuration file named paygate.php in your Laravel application's config directory and add the following content:

<?php

return [
    'paygate_id' => env('PAYGATE_ID'),
    'paygate_secret' => env('PAYGATE_SECRET'),
    'notification_url' => env('PAYGATE_NOTIFICATION_URL'),
    'return_url' => env('PAYGATE_RETURN_URL'),
];

Make sure to set the environment variables PAYGATE_ID, PAYGATE_SECRET, PAYGATE_NOTIFICATION_URL, and PAYGATE_RETURN_URL in your .env file with your actual PayGate credentials.

```

##Usage
##Vanilla PHP

```shell
<?php

require 'vendor/autoload.php';

use rainwaves\PaygatePayment\Client\PayWebClient;

// Create an instance of PayWebClient with your PayGate credentials
$client = new PayWebClient('your_paygate_id', 'your_encryption_key');

// Initialize payment
$inputData = [
    'reference' => 'order_123',
    'amount' => 100.00,
    'currency' => 'USD',
    'returnUrl' => 'https://example.com/return',
    'notifyUrl' => 'https://example.com/notify',
    // Add more required input data as needed
];
$response = $client->initiatePayment($inputData);

// Generate the payment form
$formHtml = $client->createForm();

// Display the payment form to the user
echo $formHtml;
```

##Laravel

```shell
<?php

use Illuminate\Http\Request;
use rainwaves\PaygatePayment\Client\PayWebClient;

// Initialize payment
$inputData = [
    'reference' => 'order_123',
    'amount' => 100.00,
    'currency' => 'USD',
    'returnUrl' => 'https://example.com/return',
    'notifyUrl' => 'https://example.com/notify',
    // Add more required input data as needed
];
$response = app(PayWebClient::class)->initiatePayment($inputData);

// Generate the payment form
$formHtml = app(PayWebClient::class)->createForm();

// Display the payment form to the user
echo $formHtml;

// Handle the payment response (e.g., in a controller)
public function handlePaymentResponse(Request $request)
{
    $response = $request->all();

    // Process the payment response
}
```



For more information and available methods, please refer to the package documentation.

## Testing
To run the PHPUnit test cases for the package, use the following command:

vendor/bin/phpunit

## License
This package is open-source software licensed under the MIT license.


Make sure to replace `'your_paygate_id'` and `'your_encryption_key'` with your actual PayGate ID and encryption key.

Feel free to customize the README further based on your package's specific features and usage instructions.
