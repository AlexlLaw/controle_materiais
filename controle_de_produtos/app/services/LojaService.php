<?php


namespace App\services;


use App\EnumMensage\EnumMenssage;
use App\Produtos;
use App\TurmasMateriais;
use App\Vendas;
use App\VendasItens;
use http\Env\Request;
use PhpParser\Node\Expr\Array_;

/**
 * Class LojaService
 * @package App\services
 */
class LojaService implements LojaServiceInterface
{
    /**
     * @var ProdutoService
     */
    private $produtoService;

    /**
     * @var VendasService
     */
    private $vendasService;

    /**
     * LojaService constructor.
     * @param ProdutoService $produtoService
     * @param VendasService $vendasService
     */
    public function __construct(ProdutoService $produtoService, VendasService $vendasService)
    {
        $this->produtoService = $produtoService;
        $this->vendasService = $vendasService;
    }

    /**
     * @return Vendas[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAllVendas()
    {
        $vendas = Vendas::all();

        return $vendas;
    }

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
     ) {
         $venda = array(
             'serie_id' => $aluno,
             'dt_venda' => $dtVenda,
             'finalizada' => $finalizada
         );

         $vendas = $this->vendasService->createVendas($venda);
         $produtos = $this->produtoService->findById($idProduto);

         $valorVenda = $qtdProdutos * $produtos->valor;
         $qtd_venda = $qtdProdutos;
         $vendasItens = array(
             'vendas_id' => $vendas->id,
             'produto_id' => $produtos->id,
             'preco' => $valorVenda,
             'qtd_produtos' => (int)$qtd_venda
         );

         $vendasItem = $this->vendasService->createVendasItens($vendasItens);

         if ($vendasItem->qtd_produtos > $produtos->qtd_produto) {

             return EnumMenssage::MSG02;
         }

         if ($vendasItem->qtd_produtos == $produtos->qtd_produto) {
             $this->produtoService->remove($idProduto);

             return EnumMenssage::MSG01;
         }

         $qtd_atual = (int)$produtos->qtd_produto - $vendasItem->qtd_produtos;

         if ($qtd_atual) {
             $this->produtoService->editarQtdProduto($idProduto, $qtd_atual);

             return EnumMenssage::MSG03;
         }
     }
}
