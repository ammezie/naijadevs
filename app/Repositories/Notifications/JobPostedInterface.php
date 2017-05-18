<?php

namespace App\Repositories\Notifications;

interface JobPostedInterface
{
    /**
     * @param string $title
     * @param mixed $body
     * @return mixed
     */
    public function notify($title, $body);
}
