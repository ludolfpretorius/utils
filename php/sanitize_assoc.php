<?php
    function sanitizeAssoc($arr, $allowEmptyVals = false) {
        foreach ($arr as $key =>$value) {
            if (!$allowEmptyVals && strlen($arr[$key]) == 0) {
                return 'Error: 400 (Bad request) - One or more values contain suspicious characters.';
            }
            if ($key === 'email') {
                $arr[$key] = filter_var($value, FILTER_SANITIZE_EMAIL);
            }
            if ($key === 'img') {
                $arr[$key] = filter_var($value, FILTER_SANITIZE_URL);
            }
            if ($key !== 'email' && $key !== 'img' && $key !== 'password' && $key !== 'newPassword') {
                $arr[$key] = filter_var($value, FILTER_SANITIZE_STRING);
            }
        }
        return $arr;
    }