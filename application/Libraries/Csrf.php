<?php
namespace App\Libraries;

use App\Libraries\Traits\CallStaticTrait as CallStatic;

class Csrf
{
    use CallStatic;

    const TOKEN_NAME = '_token';

    private $prefix = 'scope';

    public function scopeGenerate()
    {
        // uniqid : 함수는 보안 암호 값을 생성하지 않으므로, 암호화 목적으로 사용해서는 안됩니다. 보안 암호 값이 필요한 경우, openssl_random_pseudo_bytes()를 고려하십시오.
        // md5 : 문자열의 md5 해시를 계산
        // return Session::put(self::TOKEN_NAME, md5(uniqid()));

        if (Session::exists(self::TOKEN_NAME)) {
            return Session::get(self::TOKEN_NAME);
        }

        // bin2hex : 바이너리 데이터를 16진 표현으로 변환
        return Session::put(self::TOKEN_NAME, bin2hex(openssl_random_pseudo_bytes(16)));
    }

    public function scopeCheck($token)
    {
        if (Session::exists(self::TOKEN_NAME) && $token === Session::get(self::TOKEN_NAME)) {
            Session::delete(self::TOKEN_NAME);

            return true;
        }

        return false;
    }
}
