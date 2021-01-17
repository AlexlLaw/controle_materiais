<?php


namespace App\services;


interface TurmasServiceInterface
{
    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param $turma
     * @return mixed
     */
    public function createTurmas($turma);

    /**
     * @param int $idTurma
     */
    public function remove(int $idTurma);
}
