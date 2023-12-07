<?php

namespace App\Data\_6_servicecontainer;

class Person
{

    // fitur php8 : mendeklarasikan properti di constructor
    public function __construct(public string $firstName, public string $lastName)
    {
    }
}
