<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Illuminate\Http\File;
use PDF;
use CURLFILE;
use Illuminate\Http\Request;
use App\Events\ResponseEvent;
use Dompdf\Dompdf;
use Dompdf\Options;
// use Illuminate\Contracts\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WatermarkController extends Controller
{
    public function generatePDF(){
        $data = [
            'title' => 'Welcome to Nicesnippets.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data);

        $pdf->setPaper('L');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'Nicesnippets.com', null,
        55, array(0,0,0),2,2,-30);

        return $pdf->download('nicesnippets.pdf');

    }
    public function generatePdfMetaData(){
        $data = [
            'title' => 'Welcome to Nicesnippets.com',
            'date' => date('m/d/Y')
        ];
        // $pdf=PDF::addInfo(['nnn'=>'111'])->loadView('myPDF', $data);
        // $pdf->addInfo(['nnn'=>'111']);
        // $pdf = PDF::setProtocol('text')->loadView('myPDF', $data);
        $pdf = PDF::loadView('myPDF', $data);
        $pdf->add_info('title', 'AAA');
// dd($pdf->getProtocol());
        // $pdf=$pdf->getOpptions();
        // $dompdf1->loadView('myPDF', $data);
        // dd($pdf->dompdf->getOpptions());
        // $dompdf=new Dompdf();
        // $options=new Options();
        // $options->set('debugKeepTemp', 'Courie1r');
        // $dompdf = new Dompdf($options);
        // $options = $dompdf->getOptions();
        // dd($options);

        $pdf->setPaper('L');
        // $pdf->setOptions(['adminPassword'=>'123']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'Nicesnippets.com', null,
        55, array(0,0,0),2,2,-30);



        $path = 'public/2108.pdf';
// dd($pdf->output());
        $put_file = Storage::disk('local')->put($path, $pdf->output());
// $gfile=Storage::url('app/public/2101.pdf');
        // $get_file=Storage::disk('local')->get($gfile);

        // $get_file=storage_path() . "/app/".$data->file_path
        // ashxatuma
        // $get_file=File::get(storage_path('app/public/2101.pdf'));
        // ashxatuma
        $get_file=public_path('2101.pdf');
        //  $get_file=file_get_contents($get_file);
        // $get_file=File::files(public_path('app/public'));
        // $k=new CURLFile($get_file);
        // $k= \return Response::make($path, 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="application_receipt.pdf"'
        // ]);
        dd($get_file);
    }
}
