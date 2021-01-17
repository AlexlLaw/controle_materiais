<?php


namespace App\services;


use App\Serie;
use Illuminate\Http\Request;

/**
 * Class AlunoService
 * @package App\services
 */
class AlunoService implements AlunoServiceInterface
{
    /**
     * @param $dados
     * @return mixed
     */
    public function findAll($dados)
    {
        $alunos = Serie::query()
            ->orderBy('nome')
            ->get();

        return $alunos;
    }

    /**
 * @param int $idAluno
 * @return mixed
 */
    public function findById(int $idAluno)
    {
        $aluno = Serie::find($idAluno);

        return $aluno;
    }

    /**
     * @param $dados
     * @return mixed
     */
    public function createAluno($dados)
    {
        $alunos = Serie::create($dados);

        return $alunos;
    }

    /**
     * @param Request $dados
     * @param int $idAluno
     */
    public function editar($dados, int $idAluno)
    {
        $aluno = Serie::find($idAluno);

        if (isset($dados['nome'])) {
            $aluno->nome = $dados['nome'];
        }

        if (isset($dados['dt_nascimento'])) {
            $aluno->dt_nascimento = $dados['dt_nascimento'];
        }

        if (isset($dados['turma'])) {
            $aluno->turma = $dados['turma'];
        }

        if (isset($dados['cep'])) {
            $aluno->cep = $dados['cep'];
        }

        if (isset($dados['endereco'])) {
            $aluno->endereco = $dados['endereco'];
        }

        if (isset($dados['bairro'])) {
            $aluno->bairro = $dados['bairro'];
        }

        if (isset($dados['cidade'])) {
            $aluno->cidade = $dados['cidade'];
        }

        $aluno->save();
    }

    /**
     * @param int $idAluno
     */
    public function remove(int $idAluno)
    {
        Serie::destroy($idAluno);
    }
}
