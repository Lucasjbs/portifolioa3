<?php

namespace Portifolio\Workbench\Model;

class Password
{
    private string $password;
    public const RAW = 0;

    public function __construct(string $password, int $status = self::RAW)
    {
        if ($status == self::RAW) {
            $this->password = $this->passwordEncryptor($password);
        }
    }

    public function passwordVerifier(string $passwordRaw, string $passwordHash): bool
    {
        $isPasswordCorrect = password_verify($passwordRaw, $passwordHash);
        return $isPasswordCorrect;
    }

    public function getSafePassword(): string
    {
        return $this->password;
    }

    private function passwordEncryptor(string $password): string
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $hashedPassword;
    }
}