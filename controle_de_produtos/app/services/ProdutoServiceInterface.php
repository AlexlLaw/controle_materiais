<?php


namespace App\services;


use App\Http\Requests\ProdutoFormRequest;
use Illuminate\Http\Request;

/**
 * Interface ProdutoServiceInterface
 * @package App\services
 */
interface ProdutoServiceInterface
{
    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param int $idProduto
     * @return mixed
     */
    public function findById(int $idProduto);

    /**
     * @param ProdutoFormRequest $request
     * @return mixed
     */
    public function createProduto(ProdutoFormRequest $request);

    /**
     * @param $idProduto
     * @return mixed
     */
    public function remove($idProduto);

    /**
     * @param int $idProduto
     * @param $dados
     */
    public function editar(int $idProduto, array $dados);

    /**
     * @param int $idProduto
     * @param $dados
     */
    public function editarQtdProduto(int $idProduto, int $qtd_atual);

}
