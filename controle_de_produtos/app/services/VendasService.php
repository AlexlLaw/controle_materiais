<?php


namespace App\services;


use App\Vendas;
use App\VendasItens;

class vendasService implements VendasServiceInterface
{
    /**
     * @param array $venda
     * @return mixed
     */
    public function createVendas(array $venda)
    {
      $vendas =  Vendas::create($venda);

      return $vendas;
    }

    /**
     * @param array $vendasItens
     * @return mixed
     */
    public function createVendasItens(array $vendasItens)
    {
        $vendasItens = VendasItens::create($vendasItens);

        return $vendasItens;
    }
}
