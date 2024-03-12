<?php

namespace App\Http\Requests;

class FeedbackRequest extends FormRequest {
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required|string',
            'message' => 'required|string',
            'channel' => 'required|string',
            'phone' => [
                'required', 'string',
                function (string $attribute, mixed $value, \Closure $fail) {
                    $matches = [];
                    preg_match_all('/(?:\+|\d)[\d\-\(\) ]{9,}\d/', $value, $matches);
                    $matches = $matches[0];
                    if (strlen($value) < 10 || count($matches) == 0) {
                        $fail("Invalid phone number");
                    }
                }
            ]
        ];
    }
}
