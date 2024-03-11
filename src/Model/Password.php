<?php

namespace Portifolio\Workbench\Model;

class Password
{
    private string $password = "";
    public const SAFE = 0;
    public const RAW = 1;

    public function __construct(string $password, int $status = self::SAFE)
    {
        if ($status == self::SAFE) {
            $this->password = $this->passwordEncryptor($password);
        }
        
        if ($status == self::RAW) {
            $this->password = $password;
        }
    }

    public function passwordVerifier(string $passwordHash): bool
    {
        $isPasswordCorrect = password_verify($this->password, $passwordHash);
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
