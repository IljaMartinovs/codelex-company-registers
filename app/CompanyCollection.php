<?php

namespace App;

class CompanyCollection {

    public array $companies;

    public function addCompany(Company $company)
    {
        $this->companies[]=$company;
    }

    public function lastThirty(): array
    {
        return array_slice($this->companies,-30);
    }

    public function searchByName(string $name): ?Company
    {
        foreach ($this->companies as $company){
            if ($company->getName()===$name){
                return $company;
            }
        } return null;
    }

    public function searchRegistrationNumber(string $number): ?Company
    {
        foreach ($this->companies as $company){
            if ($company->getRegistrationNumber()===$number){
                return $company;
            }
        } return null;
    }

}