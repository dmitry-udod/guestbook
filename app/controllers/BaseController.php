<?php

namespace controllers;

class BaseController
{
    protected $twig;

    function __construct($twig)
    {
        $this->twig = $twig;
    }
}