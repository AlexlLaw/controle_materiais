<?php


namespace App\services;

use App\Vendas;

/**
 * Interface LojaServiceInterface
 * @package App\services
 */
interface LojaServiceInterface
{
    /**
     * LojaService constructor.
     * @param ProdutoService $produtoService
     * @param VendasService $vendasService
     */
    public function __construct(ProdutoService $produtoService, VendasService $vendasService);

    /**
     * @return Vendas[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAllVendas();

    /**
     * @param int $aluno
     * @param string $dtVenda
     * @param int $finalizada
     * @param int $idProduto
     * @param string $qtdProdutos
     * @return string
     */
    public function vendas(
        int $aluno,
        string $dtVenda,
        int $finalizada,
        int $idProduto,
        string $qtdProdutos
    );
}
