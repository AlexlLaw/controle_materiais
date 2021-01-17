<?php

namespace App\Http\Controllers;


use App\services\CsvService;
use Illuminate\Http\Request;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    /**
     * @var CsvService
     */
    private $csvService;

    /**
     * CsvController constructor.
     * @param CsvService $csvService
     */
    public function __construct(CsvService $csvService)
    {
        $this->csvService = $csvService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('csv.create');
    }

    /**
     * @param Request $request
     */
    public function csv_import(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $savePath = public_path('/upload/');
        $file->move($savePath, $fileName);

        $this->csvService->upload($fileName);

        $request->session()
            ->flash('mensagem', "Arquivo importado com sucesso");

        return view('csv.create');
    }



}
