<?php

namespace App\Utils;

class Validator {
    public function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validateWebsite(?string $website): bool {
        return $website === null || filter_var($website, FILTER_VALIDATE_URL) !== false;
    }
}
