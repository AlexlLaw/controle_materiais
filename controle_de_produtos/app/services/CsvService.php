<?php


namespace App\services;

use App\Produtos;
use App\Turmas;
use App\TurmasMateriais;
use League\Csv\Reader;
use League\Csv\Statement;


class CsvService
{
    /**
     * @var ProdutoService
     */
    private $produtoService;

    /**
     * @var TurmasService
     */
    private $turmaService;

    /**
     * LojaService constructor.
     * @param ProdutoService $produtoService
     * @param VendasService $vendasService
     */
    public function __construct(ProdutoService $produtoService, TurmasService $turmaService)
    {
        $this->produtoService = $produtoService;
        $this->turmaService = $turmaService;
    }

    /**
     * @param string $nomeArquivo
     * @throws \League\Csv\Exception
     */
    public function upload(string $nomeArquivo)
    {
        $stream = fopen(__DIR__ . "/../../public/upload/" . $nomeArquivo, "r");

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(";");
        $csv->setHeaderOffset(0);

        $stmt = (new Statement());
        $modelCsvs = $stmt->process($csv);

        $this->validaDados($modelCsvs);
    }

    /**
     * @param $modelCsvs
     * @return mixed
     */
    public function validaDados($modelCsvs)
    {
        foreach ($modelCsvs as $modelCsv) {
            $turmas = [];

            array_map(function ($key, $value) use ($modelCsv, &$turmas) {
                if ($value === 'x') {
                    $turmas['turmas'][] = $key;
                }
            }, array_keys($modelCsv), $modelCsv);

            $produto = [
                'nome'=>  $modelCsv['Produto'],
                'valor' => (float)$modelCsv['Preço'],
                'qtd_produto' => $modelCsv['Estoque']
            ];

            $produto = Produtos::create($produto);
            $idProduto = $produto->id;
            $this->verificacaoTurmasMateriais($turmas, $idProduto);
        }
    }

    /**
     * @param array $turmas
     * @param int $idProduto
     */
    public function verificacaoTurmasMateriais(array $turmas, int $idProduto)
    {
        foreach ($turmas['turmas'] as $turma) {
            $hasTurma = Turmas::where('nome', $turma)->get();
            $turmaRes = !empty($hasTurma) ? $hasTurma->first() : null;
            $id = $turmaRes ? $turmaRes->id : null;

            if (empty($id)) {
                $turmaNome = [
                    'nome' => $turma
                ];
                $classe = Turmas::create($turmaNome);
                $idClasse = $classe->id;
            }
            $turmaMaterial = [
                'produto_id' => $idProduto,
                'turma_id' => ($id == null) ? $idClasse : $id
            ];

            TurmasMateriais::create($turmaMaterial);
        }
    }
}
