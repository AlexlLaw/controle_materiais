<?php


namespace App\services;


interface VendasServiceInterface
{
    /**
     * @param array $venda
     * @return mixed
     */
    public function createVendas(array $venda);

    /**
     * @param array $vendasItens
     * @return mixed
     */
    public function createVendasItens(array $vendasItens);

}
