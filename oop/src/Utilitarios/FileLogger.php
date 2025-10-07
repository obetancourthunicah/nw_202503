<?php

namespace Unicah\Oop\Utilitarios;

use DateTime;
use Exception;

class FileLogger implements ILogger
{
    private int $levelValue;
    private array $levelMap = [
        "Error"  => 1,
        "Warn"  => 2,
        "Debug"  => 3,
        "Info"  => 4
    ];
    public function __construct(string $level)
    {
        if (isset($this->levelMap[$level])) {
            $this->levelValue = $this->levelMap[$level];
        } else {
            throw new Exception("Invalid value for level only Info, Debug, Warn or Error allowed.");
        }
    }
    public function Info(string $message, string $origin, mixed $context)
    {
        if ($this->levelValue >= $this->levelMap["Info"]) {
            $this->saveMessage(
                "Info",
                $message,
                $origin,
                $context
            );
        }
    }
    public function Debug(string $message, string $origin, mixed $context)
    {
        if ($this->levelValue >= $this->levelMap["Debug"]) {
            $this->saveMessage(
                "Debug",
                $message,
                $origin,
                $context
            );
        }
    }
    public function Warn(string $message, string $origin, mixed $context)
    {
        if ($this->levelValue >= $this->levelMap["Warn"]) {
            $this->saveMessage(
                "Warn",
                $message,
                $origin,
                $context
            );
        }
    }
    public function Error(string $message, string $origin, mixed $context)
    {
        if ($this->levelValue >= $this->levelMap["Error"]) {
            $this->saveMessage(
                "Error",
                $message,
                $origin,
                $context
            );
        }
    }

    private function saveMessage(string $type, string $message, string $origin, mixed $context)
    {
        $datetime = new DateTime();
        $row = [
            $datetime->format('c'),
            $type,
            $message,
            $origin,
            json_encode($context)
        ];
        $filename = "logs/my_log.log";
        $stringToAppend = implode("\t", $row) . "\n";
        file_put_contents($filename, $stringToAppend, FILE_APPEND);
    }
}
