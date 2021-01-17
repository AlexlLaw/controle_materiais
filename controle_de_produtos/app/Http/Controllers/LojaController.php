<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\Serie;
use App\services\LojaService;
use App\services\ProdutoService;
use App\Vendas;
use App\VendasItens;
use Illuminate\Http\Request;

class LojaController extends Controller
{

    /**
     * @var LojaService
     */
    private $lojaService;

    /**
     * ProdutoController constructor.
     * @param ProdutoService $produtoService
     */
    public function __construct(LojaService $lojaService)
    {
        $this->lojaService = $lojaService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $vendas = $this->lojaService->findAllVendas();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('loja.index', compact('vendas', 'mensagem'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $alunos = Serie::all();
        $produtos = Produtos::all();

        return view('loja.create', compact('alunos', 'produtos'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request, LojaService $lojaService)
    {
        $aluno = $request->get('aluno');
        $dtVenda = $request->get('dt_venda');
        $finalizada = true;
        $idProduto =  $request->get('produto');
        $qtdProdutos = $request->get('qtd_produtos');

        $reposta = $lojaService->vendas($aluno, $dtVenda, $finalizada,  $idProduto, $qtdProdutos);

        $request->session()
            ->flash('mensagem', "$reposta");

        return redirect()->route('listar_produtos');
    }

    public function destroy()
    {
        //
    }
}
