<?php
namespace App\Libraries\Rules;

use App\Models\User;

trait OnlyEmailUserTrait
{
    private function only_email_users($value)
    {
        $user = new User;
        $count = $user->emailOverlapCheck($value);
        if ($count === 0) {
            return true;
        }

        return false;
    }
}
