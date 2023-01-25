<?php 

namespace Controller;

/**
 * make_pdf class
 */
use \Model\Auth;

class Make_pdf extends Controller
	{

	public function index()
	{
		/*if(!Auth::logged_in())
		{
			message('please login to view the admin section');
			redirect('login');
		}*/

		$folder = 'generated_pdfs/';
		if(!file_exists($folder))
		{
			mkdir($folder,0777,true);
		}

 		require_once __DIR__ . '/../models/mpdf/autoload.php';
		
		//$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		// $fontData = $defaultFontConfig['fontdata'];

		 $mpdf = new \Mpdf\Mpdf([
		    
		//     'fontdata' => $fontData + [
		//         'roboto' => [
		//             'R' => 'Roboto-Regular.ttf',
		//             'I' => 'Roboto-Italic.ttf',
		//         ]

		//     ],
		   
		 ]);

		$html = file_get_contents(ROOT.'/admin/make_pdf.view.php');
		$mpdf->WriteHTML($html);
		

		$file_name = $folder.'_new_member_form_'.date("Y-m-d_H_i_s",time()).'.pdf';
		
		$mpdf->Output();

		if(file_exists($file_name)){

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file_name)); //Absolute URL
			ob_clean();
			flush();
			readfile($file_name); //Absolute URL
			exit();
		}


		//$this->view('admin/make_pdf',$data);
	}
}