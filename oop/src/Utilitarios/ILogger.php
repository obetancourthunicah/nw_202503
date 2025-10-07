<?php

namespace Unicah\Oop\Utilitarios;

interface ILogger
{
    public function __construct(string $level);
    public function Info(string $message, string $origin, mixed $context);
    public function Debug(string $message, string $origin, mixed $context);
    public function Warn(string $message, string $origin, mixed $context);
    public function Error(string $message, string $origin, mixed $context);
}
