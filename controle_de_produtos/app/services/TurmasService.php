<?php


namespace App\services;


use App\Turmas;

/**
 * Class TurmasService
 * @package App\services
 */
class TurmasService implements TurmasServiceInterface
{
    /**
     * @return mixed
     */
    public function findAll()
    {
        $turmas = Turmas::query()
            ->orderBy('nome')
            ->get();

        return $turmas;
    }

    /**
     * @param $turma
     * @return mixed
     */
    public function createTurmas($turma)
    {
        $turma =  Turmas::create($turma);

        return $turma;
    }

    /**
     * @param int $idTurma
     */
    public function remove(int $idTurma)
    {
        Turmas::destroy($idTurma);
    }

}
