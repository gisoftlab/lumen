<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeamNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The team was not found.');
    }
}