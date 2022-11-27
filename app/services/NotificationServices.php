<?php

class NotificationServices
{
    
    private ?string $message;

    function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Mock send email process
     */
    public function sendEmail(Employee $employee):void
    {
        sleep(10);
    }
    
}