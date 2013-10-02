<?php

namespace controllers;

class BaseController
{
    protected $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }
}
