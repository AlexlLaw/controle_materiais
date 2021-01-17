<?php


namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\services\AlunoService;
use App\services\TurmasService;
use Illuminate\Http\Request;

/**
 * Class AlunoController
 * @package App\Http\Controllers
 */
class AlunoController extends Controller
{
    /**
     * @var AlunoService
     */
     private $alunoService;

    /**
     * @var TurmasService
     */
    private $turmasService;

    /**
     * AlunoController constructor.
     * @param AlunoService $alunoService
     * @param TurmasService $turmasService
     */
     public function __construct(AlunoService $alunoService, TurmasService $turmasService)
     {
         $this->alunoService = $alunoService;
         $this->turmasService = $turmasService;
     }

    /**
     * @param Request $request
     * @return mixed
     */
     public  function index(Request $request)
     {
         $alunos = $this->alunoService
             ->findAll($request);

         $mensagem = $request->session()
             ->get('mensagem');

         $request->session()
             ->remove('mensagem');

         return view('series.index', compact('alunos','mensagem'));
     }

    /**
     * @return mixed
     */
     public function create()
     {
         $turmas = $this->turmasService
             ->findAll();

         return view('series.create', compact('turmas'));
     }

    /**
     * @param SeriesFormRequest $request
     * @return mixed
     */
     public function store(SeriesFormRequest $request)
     {
        $aluno =  $this->alunoService
            ->createAluno($request->all());

        $request->session()
            ->flash('mensagem', "Aluno(a) {$aluno->nome} inserido com sucesso.");

        return redirect()->route('listar_series');
     }

    /**
     * @param int $idAluno
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $idAluno)
    {
        $turmas = $this->turmasService
            ->findAll();

        $aluno = $this->alunoService
            ->findById($idAluno);

        return view('series.edit', compact('aluno', 'turmas'));
    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, int $idAluno)
    {
        $this->alunoService->editar($request->all(), $idAluno);

        return redirect()->route('listar_series');
    }

    /**
     * @param Request $request
     * @return mixed
     */
     public function destroy(Request $request)
     {
       $this->alunoService
           ->remove($request->id);

        $request->session()
             ->flash('mensagem', "Aluno(a) removido(a) com sucesso");

        return redirect()->route('listar_series');
     }
}
