# PayGate Payment Package

The PayGate Payment Package provides a convenient way to integrate with the PayGate payment gateway for processing online payments. For more information, visit the [PayGate Documentation](https://docs.paygate.co.za).

## Installation

You can install the PayGate Payment Package via Composer. Run the following command in your project directory:
```php
composer require rainwaves/paygate-payment
```

## Configuration

After installing the package, you need to configure it with your PayGate credentials. In Laravel, you'll need to publish the config file and set the credentials in your .env file:- PAYGATE_ID=XXXXXXXX
- PAYGATE_SECRET=XXXXXXXXXX
- PAYGATE_NOTIFICATION_URL=XXXXXXXX
- PAYGATE_RETURN_URL=XXXXXXXXXXXX
- PAYGATE_SUBS_RETURN_URL=XXXXXXXXXXXX


## Usage

### Vanilla PHP

````php 
require 'vendor/autoload.php';

// Create an instance of PayWebClient with your PayGate credentials
$client = new PayWeb('10011072130', 'secret');
$transactionDate = Carbon::now()->format('Y-m-d H:i:s');

// Initialize payment
$inputData = [
    'reference' => 'order_123',
    'amount' => 1599.00,
    'currency' => 'ZAR',
    'returnUrl' => 'https://example.com/return',
    'notifyUrl' => 'https://example.com/notify',
    'transactionDate'   => $transactionDate,
    'locale' => 'en-za',
    'country' => 'ZAF',
    'email' => 'customer@paygate.co.za',
];
$response = $client->initiatePayment($inputData);

// Generate the payment form
$formHtml = $client->createForm();

// Display the payment form to the user
echo $formHtml;
````

A form with to submit the data to paygate will be generated.

### Laravel
Assuming you have the necessary routes and views set up, here's an example of how to use the PayGate Payment Package in Laravel:
````php

class PaymentController extends Controller
{
    public Collection $products;
    protected PayWebInterface $payWeb;
    protected PaySubsInterface $paySubs;

    public function __construct(PayWebInterface $payWeb, PaySubsInterface $paySubs)
    {
        $this->products = $this->setProducts();
        $this->payWeb = $payWeb;
        $this->paySubs = $paySubs;

    }

    public function products()
    {
        $products = $this->products->toArray();
        return view('welcome', compact('products'));
    }
    public function response(Request $request)
    {
        $response = new PayGateNotifyResponse($request->toArray());
        Log::debug(json_encode("========================Return response================================"));
        Log::debug(json_encode($request->all()));
    }

    public function notify(Request $request)
    {
        $response = new PayGateNotifyResponse($request->toArray());
        Log::debug(json_encode("========================Notify response================================"));
        Log::debug(json_encode($request->all()));
    }

    public function payment($id)
    {
        $transactionDate = Carbon::now()->format('Y-m-d H:i:s');

        $product = $this->products->first(function ($product) use ($id) {
            return $product['id'] === (int)$id;
        });
        $inputData = [
            'reference' => uniqid('pgtest_'),
            'amount' => $product['price'],
            'currency' => 'ZAR',
            'returnUrl' => config('paygate.return_url'),
            'notifyUrl' => config('paygate.notification_url'),
            'transactionDate'   => $transactionDate,
            'locale' => 'en-za',
            'country' => 'ZAF',
            'email' => 'customer@paygate.co.za',
        ];

        $this->payWeb->initiatePayment($inputData);
        $formHtml = $this->payWeb->createForm();

        return view('payment', compact('product', 'formHtml'));
    }

    public function subscription()
    {
        $transactionDate = Carbon::now()->format('Y-m-d H:i:s');
        $startDate = Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d');
        $endDate = Carbon::now()->addYear()->endOfMonth()->format('Y-m-d');
        $data = array(
            'version'            => 21,
            'reference'          => 'pgtest_123456789',
            'amount'             => 20000.00,
            'currency'           => 'ZAR',
            'returnUrl'         => 'https://fec0-41-216-202-254.ngrok-free.app/sub-response',
            'transactionDate'   => $transactionDate,
            'subsStartDate'    => $startDate,
            'subsEndDate'      => $endDate,
            'subsFrequency'     => 228,
            'processNow'        => 'YES',
            'processNowAmount' => 32.99,
        );

        $htmlForm = $this->paySubs->createSubscriptionAndChain($data)->createForm();

        return view('form', compact('htmlForm'));
    }

    public function subResponse(Request $request)
    {
        Log::debug(json_encode("========================Subscription response================================"));
        Log::debug(json_encode($request->all()));
    }
    private function setProducts(): Collection
    {
        return collect([
             [
                'id'=> 1,
                'name' => 'Product 1',
                'description' => 'Description of Product 1',
                'price' => 321.99,
            ],
            [
                'id'=> 2,
                'name' => 'Product 2',
                'description' => 'Description of Product 2',
                'price' => 245.99,
            ],
            [
                'id'=> 3,
                'name' => 'Product 3',
                'description' => 'Description of Product 3',
                'price' => 159.99,
            ],
        ]);
    }
}
````

Make sure to replace 'your_paygate_id' and 'your_encryption_key' with your actual PayGate ID and encryption key.

## Testing
To run the PHPUnit test cases for the package, use the following command:

vendor/bin/phpunit

## License
This package is open-source software licensed under the MIT license.


Make sure to replace `'your_paygate_id'` and `'your_encryption_key'` with your actual PayGate ID and encryption key.

Feel free to customize the README further based on your package's specific features and usage instructions.
