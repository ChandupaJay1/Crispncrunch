<?php

class Validator
{
    public static function email(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function mobile(string $mobile): bool
    {
        $regex = '/^(0|\+94)7[01245678][0-9]{7}$/';
        return preg_match($regex, $mobile);
    }
}
