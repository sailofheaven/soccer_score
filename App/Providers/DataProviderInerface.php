<?php

namespace App\Providers;


interface DataProviderInerface
{
    public function findByIndex($i);

    public function findById($id);
}