<?php declare(strict_types=1);

namespace Architecture\Infrastructure\Services;

use Architecture\Domain\Services\SendMailServiceInterface;

class SendMailService implements SendMailServiceInterface
{

    public function sendEmail(string $recipients, string $subject, string $body): void
    {
        // TODO: Implement sendEmail() method.
    }
}