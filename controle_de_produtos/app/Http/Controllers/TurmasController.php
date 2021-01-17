<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmasFormRequest;
use App\services\TurmasService;
use App\Turmas;
use Illuminate\Http\Request;

class TurmasController extends Controller
{
    /**
     * @var TurmasService
     */
    private $turmasService;

    /**
     * TurmasController constructor.
     * @param TurmasService $turmasService
     */
    public function __construct(TurmasService $turmasService)
    {
        $this->turmasService = $turmasService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $turmas = $this->turmasService->findAll();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('turmas.index', compact('turmas','mensagem'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('turmas.create');
    }

    /**
     * @param Request $request
     */
    public function store(TurmasFormRequest $request)
    {
        $turma =  $this->turmasService->createTurmas($request->all());
        $request->session()
            ->flash('mensagem', "turma {$turma->id} cadastrada com  sucesso {$turma->nome}");

        return redirect()->route('listar_turmas');
    }

    /**
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $this->turmasService->remove($request->id);
        $request->session()
            ->flash('mensagem', "Turma removida com sucesso");

        return redirect()->route('listar_turmas');
    }

}
