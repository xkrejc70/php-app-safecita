<?php

namespace App\Utils;

class Validator {
    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isUrlValid(string $url): bool {
        $pattern = '/^(https?):\/\/[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\/[^\s]*)?$/i';
        return preg_match($pattern, $url);
    }
}
