<?php


namespace App\services;

use Illuminate\Http\Request;

/**
 * Interface AlunoServiceInterface
 * @package App\services
 */
interface AlunoServiceInterface
{
    /**
     * @param $dados
     * @return mixed
     */
    public function findAll($dados);

    /**
     * @param int $idAluno
     * @return mixed
     */
    public function findById(int $idAluno);

    /**
     * @param $dados
     * @return mixed
     */
    public function createAluno($dados);

    /**
     * @param Request $dados
     * @param int $idAluno
     * @return mixed
     */
    public function editar($dados, int $idAluno);

    /**
     * @param int $idAluno
     */
    public function remove(int $idAluno);
}
