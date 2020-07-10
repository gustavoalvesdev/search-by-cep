<?php 
/**
 * This is a unit test for the Search class
 * PHP Version 7.4
 * 
 * @see     https://github.com/gustavoalvesdev/search-by-cep Search By CEP GitHub Repository
 * 
 * @author  Gustavo Alves da Silva (gustavoalvesdev) <gustavo.silva217@fatec.sp.gov.br>
 * @license https://github.com/gustavoalvesdev/search-by-cep/blob/master/LICENSE MIT License
 * @note    This program is distributed in the hope that it will be useful - WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or    
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

use PHPUnit\Framework\TestCase;
use Gustavoalvesdev\SearchByCEP\Search;

class SearchTest extends TestCase
{
    /**
     * Function to test if the addresses are being received correctly
     * @dataProvider dataAddressCollection
     *
     * @param string $input       the zipCode for the address
     * @param array  $expected    the expected result to be returned by ViaCEP API
     * 
     */
    public function testGetAddressFromZipCodeDefaultUsage(string $input, array $expected)
    {
        $result = new Search();
        $result = $result->getAddressFromZipCode($input);
        
        $this->assertEquals($expected, $result);
    }

    /**
     * Function that contains a collection of data to be tested
     * 
     * @return array
     * 
     */
    public function dataAddressCollection() : array
    {
        return array(
            "Se Square Address" => 
            array(
                "01001000", 
                array(
                    "cep" => "01001-000",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "unidade" => "",
                    "ibge" => "3550308",
                    "gia" => "1004")
                ),
            "Some Other Address" => 
            array(
                "03624010", 
                array(
                    "cep" => "03624-010",
                    "logradouro" => "Rua Luís Asson",
                    "complemento" => "",
                    "bairro" => "Vila Buenos Aires",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "unidade" => "",
                    "ibge" => "3550308",
                    "gia" => "1004"
                )
            )
        );
    }



}
