<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;
use DB;
use Auth;

class PDFController extends Controller
{
    public function exportpdf() {
    	$pdf = new Fpdf();
	    $customers 	=	DB::table('tb_customer')->where('admin_id', Auth::user()->id)->get();
		
		$pdf::AddPage('L','Legal');
		$pdf::SetFont('Arial','B',18);
		$pdf::Cell(0,10,"Customers",0,"","C");
		$pdf::Ln();
		$pdf::Ln();
		$pdf::SetFont('Arial','B',12);
		$pdf::cell(15,8,"",1,"","C");
		$pdf::cell(50,8,"Name",1,"","C");
		$pdf::SetX(75);
		$pdf::cell(75,8,"Address",1,"","C");
		$pdf::cell(10,8,"Gender",1,"","C");
		$pdf::cell(10,8,"Contact Number",1,"","C");
		$pdf::cell(10,8,"Date Register",1,"","C");
		$pdf::Ln();

		
		foreach ($customers as $key => $value) {


		if(strlen($value->name)==21){

			
			$c_height = 10;


			$w_w = $c_height/3;
			$w_w_1 = $w_w+2;
			$w_w1 = $w_w+$w_w+$w_w+3;

			//Numbering Column
			$pdf::SetX(10);
			$pdf::Cell(15,$c_height,$key++,'LTRB',0,'C',0);

			// Name Column
			$name = $value->name;
			$w_text = str_split($name,20);
			
			
			$pdf::cell(50,$w_w_1,$w_text[0],'','','L');

			$pdf::SetX(25);
			$pdf::Cell(50,$w_w1,$w_text[1],'','','L');

			$pdf::SetX(25);
			$pdf::Cell(50,$c_height,'','LTRB',0,'L',0);

			// Address Column
			if (strlen($value->address)>20) {
				$address = $value->address;
				$w_text = str_split($address,20);
				
				$pdf::SetX(75);
				$pdf::cell(50,$w_w_1,$w_text[0],'','','L');

				$pdf::SetX(75);
				$pdf::Cell(75,$w_w1,$w_text[1],'','','L');

				$pdf::SetX(75);
				$pdf::Cell(75,$c_height,'','LTRB',0,'L',0);
			}
			else{
				// $pdf::SetX(75);
				$pdf::Cell(75,10,$value->address,'LTRB',0,'L',0);
			}
			


		}
		// elseif ($value->name>=30) {
		// 	echo $value->name;
		// 	// $w_text=str_split($text,20);// splits the text into length of 7 and saves in a array since we need wrap cell of two cell we took $w_text[0], $w_text[1] alone.
		// 	// // if we need wrap cell of 3 row then we can go for    $w_text[0],$w_text[1],$w_text[2]
			
		// 	// $pdf::SetX($x_axis);
		// 	// $pdf::cell($c_width,$w_w_1,$w_text[0],'','','C');
		// 	// $pdf::SetX($x_axis);
		// 	// $pdf::Cell($c_width,$w_w1,$w_text[1],'','','C');
		// 	// $pdf::SetX($x_axis);
		// 	// $pdf::Cell($c_width,$w_w2,$w_text[2],'','','C');// for 3 rows wrap but increase the $c_height it is very important.
		// 	// $pdf::SetX($x_axis);
		// 	// $pdf::Cell($c_width,$c_height+5,'','LTRB',0,'C',0);
		// }
		else{
			// echo 'wla';
			$c_height = 10;
			$w_w = $c_height/3;
			$w_w_1 = $w_w+2;
			$w_w1 = $w_w+$w_w+$w_w+3;

		    $pdf::SetX(10);
		    $pdf::Cell(15,10,$key++,'LTRB',0,'C',0);
		    // $pdf::SetX(25);
		    $pdf::Cell(50,10,$value->name,'LTRB',0,'L',0);

		    if (strlen($value->address)>25) {
				$address = $value->address;
				$w_text = str_split($address,30);
				
				$pdf::SetX(75);
				$pdf::cell(50,$w_w_1,$w_text[0],'','','L');

				$pdf::SetX(75);
				$pdf::Cell(50,$w_w1,$w_text[1],'','','L');

				$pdf::SetX(75);
				$pdf::Cell(75,$c_height,'','LTRB',0,'L',0);
			}
			else{
				$pdf::Cell(75,10,$value->address,'LTRB',0,'L',0);
			}


		    }

			// $c_width = $pdf::GetStringWidth($value->id)+10;
			// $c_height = 10;
			// $x_axis = 10;
			// $text = $value->id;
			// $this->vcell($c_width,$c_height,$x_axis,$text);

			// $c_width = 50;
			// $x_axis = 25;
			// $text = $value->address;
			// $this->vcell($c_width,$c_height,$x_axis,$text);
			// 
			
			
			$pdf::Ln();


		}
		

	 	// $this->pageFooter();
	 	$pdf::Footer();


		$pdf::Output();
		exit;
	
	}

	public function pageFooter()
	{

		$pdf = new Fpdf();
		$pdf::SetY(266.9);
		// $pdf::Footer();
		$pdf::cell(0,10,'this'.$pdf::pageNo(),0,0,'C');


	}

	public function vcell($c_width,$c_height,$x_axis,$text){
		$pdf = new Fpdf();
		$w_w=$c_height/3;
		$w_w_1=$w_w+2;
		$w_w1=$w_w+$w_w+$w_w+3;
		
		$w_w2=$w_w+$w_w+$w_w+$w_w+7;// for 3 rows wrap
		$len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array 
		if($len==21){
			$w_text=str_split($text,20);// splits the text into length of 7 and saves in a array since we need wrap cell of two cell we took $w_text[0], $w_text[1] alone.
			// if we need wrap cell of 3 row then we can go for    $w_text[0],$w_text[1],$w_text[2]
			
			$pdf::SetX($x_axis);
			// $pdf::Cell($c_width,$w_w_1,,'','','');
			$pdf::cell($c_width,$w_w_1,$w_text[0],'','','C');
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$w_w1,$w_text[1],'','','C');
			// $pdf::SetX($x_axis);
			// $pdf::Cell($c_width,$w_w2,$w_text[2],'','','C');// for 3 rows wrap but increase the $c_height it is very important.
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$c_height,'','LTRB',0,'C',0);
		}
		elseif ($len>=30) {
			$w_text=str_split($text,20);// splits the text into length of 7 and saves in a array since we need wrap cell of two cell we took $w_text[0], $w_text[1] alone.
			// if we need wrap cell of 3 row then we can go for    $w_text[0],$w_text[1],$w_text[2]
			
			$pdf::SetX($x_axis);
			$pdf::cell($c_width,$w_w_1,$w_text[0],'','','C');
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$w_w1,$w_text[1],'','','C');
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$w_w2,$w_text[2],'','','C');// for 3 rows wrap but increase the $c_height it is very important.
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$c_height+5,'','LTRB',0,'C',0);
		}
		else{
		    $pdf::SetX($x_axis);
		    $pdf::Cell($c_width,$c_height,$text,'LTRB',0,'C',0);}
		} 

		public function ccell($c_width,$c_height,$x_axis,$text){
			$pdf = new Fpdf();
			$w_w=$c_height/3;
			$w_w_1=$w_w+2;
			$w_w1=$w_w+$w_w+$w_w+3;
			
			$w_w2=$w_w+$w_w+$w_w+$w_w+7;// for 3 rows wrap
			$len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array 
		if($len==21){
			$w_text=str_split($text,20);// splits the text into length of 7 and saves in a array since we need wrap cell of two cell we took $w_text[0], $w_text[1] alone.
			// if we need wrap cell of 3 row then we can go for    $w_text[0],$w_text[1],$w_text[2]
			
			$pdf::SetX($x_axis);
			// $pdf::Cell($c_width,$w_w_1,,'','','');
			$pdf::cell($c_width,$w_w_1,$w_text[0],'','','C');
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$w_w1,$w_text[1],'','','C');
			// $pdf::SetX($x_axis);
			// $pdf::Cell($c_width,$w_w2,$w_text[2],'','','C');// for 3 rows wrap but increase the $c_height it is very important.
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$c_height,'','LTRB',0,'C',0);
		}
		elseif ($len>=30) {
			$w_text=str_split($text,20);// splits the text into length of 7 and saves in a array since we need wrap cell of two cell we took $w_text[0], $w_text[1] alone.
			// if we need wrap cell of 3 row then we can go for    $w_text[0],$w_text[1],$w_text[2]
			
			$pdf::SetX($x_axis);
			$pdf::cell($c_width,$w_w_1,$w_text[0],'','','C');
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$w_w1,$w_text[1],'','','C');
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$w_w2,$w_text[2],'','','C');// for 3 rows wrap but increase the $c_height it is very important.
			$pdf::SetX($x_axis);
			$pdf::Cell($c_width,$c_height+5,'','LTRB',0,'C',0);
		}
		else{
		    $pdf::SetX($x_axis);
		    $pdf::Cell($c_width,$c_height,$text,'LTRB',0,'C',0);}
		} 

}
