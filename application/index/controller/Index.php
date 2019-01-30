<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Index extends Controller
{
    

    public function index()
    {
			/*
	 *生成基本的PHPexecl文件
	 */
	//$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	$spreadsheet = new Spreadsheet();

	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A2', 'bo0l 666WoDSrld !');
	
		  

	$writer = new Xlsx($spreadsheet);
	//保存文件
	$writer->save('hello world.xlsx');
    }
	
	public function test()
    {
			echo '------------<br>';
			echo(pow(121.82368,29.89476) . "<br>");
			//echo sqrt(pow((121.82368-29.89476)*111000,2);
    }
}
