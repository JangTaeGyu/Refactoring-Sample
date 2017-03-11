<?php
namespace App\Libraries\Rules;

use App\Models\User;

trait OnlyEmailUserTrait
{
    private function only_email_users($email)
    {
        $user = User::emailSearch($email);
        if (is_object($user)) {
            return false;
        }

        return true;
    }
}
