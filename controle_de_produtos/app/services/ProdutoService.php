<?php


namespace App\services;


use App\Http\Requests\ProdutoFormRequest;
use App\Produtos;
use Illuminate\Http\Request;

/**
 * Class ProdutoService
 * @package App\services
 */
class ProdutoService implements ProdutoServiceInterface
{
    /**
     * @return mixed
     */
    public function findAll()
    {
        $produtos = Produtos::all();

        return $produtos;
    }

    /**
     * @param int $idProduto
     * @return mixed
     */
    public function findById(int $idProduto)
    {
        $produto =  Produtos::find($idProduto);

        return $produto;
    }

    /**
     * @param ProdutoFormRequest $request
     * @return mixed
     */
    public function createProduto(ProdutoFormRequest $request)
    {
        $produto =  Produtos::create($request->all());

        return $produto;
    }

    /**
     * @param $idProduto
     */
    public function remove($idProduto)
    {
        Produtos::destroy($idProduto);
    }

    /**
     * @param int $idProduto
     * @param $dados
     */
    public function editar(int $idProduto, array $dados)
    {
        $produto = Produtos::find($idProduto);

        if (isset($dados['nome'])) {
            $produto->nome = $dados['nome'];
        }

        if (isset($dados['qtd_produto'])) {
            $produto->qtd_produto =  $dados['qtd_produto'];
        }

        if (isset($dados['valor'])) {
            $produto->valor = $dados['valor'];
        }

        $produto->save();
    }

    /**
     * @param int $idProduto
     * @param $dados
     */
    public function editarQtdProduto(int $idProduto, int $qtd_atual)
    {
        $produto = Produtos::find($idProduto);

        $produto->qtd_produto = $qtd_atual ;

        $produto->save();
    }


}
