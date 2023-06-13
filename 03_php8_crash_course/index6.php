<?php

class Invoice
{
    public function __construct(private $description, private $total, private $chargeDate, private $paid)
    {
    }
}

$invoice = new Invoice(
    description:'Customer installation',
    total:10000,
    chargeDate:new DateTime(),
    paid:true
);

var_dump($invoice);
