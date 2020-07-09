<?php 

namespace Gustavoalvesdev\SearchByCEP;

class Search
{
    private $url = 'https://viacep.com.br/ws/';

    public function getAddressFromZipCode(string $zipCode) : array 
    {
        // assures that zipCode constains only numbers
        $zipCode = preg_replace('/[^0-9]/im', '', $zipCode);

        // requests the zipCode information from de url and returns the result in JSON format
        $get = file_get_contents($this->url . $zipCode . '/json');

        return (array) json_decode($get);
    }

}
