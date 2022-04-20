<?php declare(strict_types=1);

namespace Architecture\Domain\Services;

interface SendMailServiceInterface
{
    public function sendEmail(string $recipients, string $subject, string $body) : void;
}