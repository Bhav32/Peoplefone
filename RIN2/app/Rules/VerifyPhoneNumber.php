<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use MessageBird\Client;
use MessageBird\Exceptions\AuthenticateException;
use MessageBird\Exceptions\RequestException;

class VerifyPhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
            // Initialize MessageBird client with your API key
            $client = new Client(config('services.messagebird.key'));

            // Generate a random verification code
            $verificationCode = mt_rand(1000, 9999);

            // Send the verification code to the user's phone number
            $message = new \MessageBird\Objects\Message();
            $message->originator = 'PeopleFone';
            $message->recipients = [$value];
            $message->body = 'Your verification code is: ' . $verificationCode;

            $client->messages->create($message);

            // Store the verification code in the session or database for later comparison
            session(['verification_code' => $verificationCode]);

    }
}
