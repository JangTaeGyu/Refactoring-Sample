<?php
namespace App\Libraries;

class Loader
{
    public static function __callStatic($method, array $parameters = [])
    {
        if (count($parameters) === 0) {
            return new \Exception('로드할 파일명을 입력해 주세요.');
        }

        $filePath = APPLICATION . ucfirst($method) . sprintf('/%s.php', $parameters[0]);
        if (is_file($filePath)) {
            return require $filePath;
        }

        return new \Exception('로드할 파일이 존재하지 않습니다.');
    }
}
