<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoFormRequest;
use App\services\ProdutoService;
use Illuminate\Http\Request;
use App\Produtos;

/**
 * Class ProdutoController
 * @package App\Http\Controllers
 */
class ProdutoController extends Controller
{

    /**
     * @var ProdutoService
     */
    private $produtoService;

    /**
     * ProdutoController constructor.
     * @param ProdutoService $produtoService
     */
    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $produtos = $this->produtoService->findAll();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('produto.index', compact('produtos','mensagem'));
    }

    /**
     * @param int $idProduto
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $idProduto)
    {
        $produto = $this->produtoService->findById($idProduto);

        return view('produto.create', compact($produto));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * @param ProdutoFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProdutoFormRequest $request, ProdutoService $produtoService)
    {
        $produto = $this->produtoService->createProduto($request);
        $request->session()
            ->flash('mensagem', "Produtos {$produto->id} inserido com sucesso {$produto->nome}");

        return redirect()->route('listar_produtos');
    }

    /**
     * @param int $idProduto
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $idProduto)
    {
        $produto = $this->produtoService->findById($idProduto);

        return view('produto.edit', compact('produto'));
    }

    /**
     * @param Request $request
     */
    public function update(int $id, Request $request)
    {
        $this->produtoService->editar($id, $request->all());

        return redirect()->route('listar_produtos');
    }

    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $this->produtoService->remove($request->id);
        $request->session()
            ->flash('mensagem', "Produtos removida com sucesso");

        return redirect()->route('listar_produtos');
    }
}
