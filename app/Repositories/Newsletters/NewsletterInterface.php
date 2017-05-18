<?php

namespace App\Repositories\Newsletters;

interface NewsletterInterface
{
    /**
     * @param string $list
     * @param string $email
     * @return mixed
     */
    public function subscribeTo($list, $email);

    /**
     * @param string $list
     * @param string $email
     * @return mixed
     */
    public function unsubscribeFrom($list, $email);
}
