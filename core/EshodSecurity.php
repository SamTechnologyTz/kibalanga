<?php

// namespace sam\core\Security;

class Security
{
    public function guard($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}