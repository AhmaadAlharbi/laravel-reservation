<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Imports\YourImportClass;

class ExcelController extends Controller
{
    // public function index()
    // {

    //     $path = storage_path('app/public/univ_aw.xls');
    //     $spreadsheet = IOFactory::load($path);
    //     // Handle the spreadsheet as needed
    //     return view('show_excel', ['spreadsheet' => $spreadsheet]);
    //     // return view('show_excel'); // Assuming 'show_excel.blade.php' is located in the 'resources/views' directory
    // }
    public function index()
    {
        $path = storage_path('app/public/Ardya-G.xls');
        $spreadsheet = IOFactory::load($path);
        $data = $spreadsheet->getActiveSheet()->toArray();

        return view('show_excel', ['data' => $data]);
    }
    public function showExcel()
    {
        $path = storage_path('app/public/univ_aw.xls'); // Adjust the path to your Excel file

        $data = Excel::toArray([], $path);

        return view('show_excel', ['data' => $data]);
    }
}
