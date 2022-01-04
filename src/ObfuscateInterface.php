<?php declare(strict_types=1);

namespace Obfuscator\Obfuscate;

interface ObfuscateInterface
{
    public function encrypt(string $source): string;
    public function decrypt(string $source): string;
}
