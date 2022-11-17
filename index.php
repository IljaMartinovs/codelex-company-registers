<?php

require_once "vendor/autoload.php";

use \App\File;

$companies = (new File('register.csv',';'))->getRecords();

while(true){
    echo "\n1. Print last 30 registers\n";
    echo "2. Find register by company name\n";
    echo "3. Find register by company registration code\n";

$selection = readline('Choose your options: ');
switch ($selection) {
    case 1:
        foreach ($companies->lastRegisters() as $key => $company) {
            echo "[$key] Company name : " . $company->getName() . " | Registration number:" . $company->getRegistrationNumber() . PHP_EOL;
        }
        break;

    case 2:
        $companyName = readline('Enter company Name :');
        $company = $companies->searchByName($companyName);

        if($company){
           echo "Company is {$company->getName()} | {$company->getRegistrationNumber()}"  . PHP_EOL;
        } else {
            echo "Company  not found\n";
        }
        break;

    case 3:
        $companyRegistrationNumber = readline('Enter company Reg Number :');
        $company = $companies->searchRegistrationNumber($companyRegistrationNumber);
        if($company){
            echo "Company is {$company->getName()} | {$company->getRegistrationNumber()}"  . PHP_EOL;
        } else {
            echo "Company  not found\n";
        }
        break;

    default:
        exit;
    }
}

