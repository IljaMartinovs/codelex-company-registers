<?php

namespace App;
use League\Csv\Reader;

class File
{
    private string $url;
    private string $delimiter;

    public function __construct(string $url, string $delimiter)
    {
        $this->url = $url;
        $this->delimiter = $delimiter;
    }

    public function getRecords(): CompanyCollection
    {
        $csv = Reader::createFromPath($this->url);
        $csv->setDelimiter($this->delimiter);
        $csv->setHeaderOffset(0);

        $records = new CompanyCollection();

        foreach($csv->getRecords() as $record){
            $records->addCompany(new Company($record["name"], $record["regcode"]));
        }
        return $records;
    }
}
