<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use PDF;
use Illuminate\Http\Request;

class GeneratePdfController extends Controller
{
    /**
     * @var \App\Models\Template
     */
    private $template;

    /**
     * @param \App\Models\Template $template
     */
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    /**
     * Show generate invoice form
     *
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('GenerateInvoice', [
            'templates' => $this->template->all()
        ]);
    }

    public function generatePdf()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $this->generateStyleSheet();
        $this->viewShare($data);
        $pdf = PDF::loadView('invoice.index', $data);
        //$pdf->render();
        return $pdf->stream();

        //$pdf->download('itsolutionstuff.pdf');
        //return response($pdf, 200)
        //    ->header('Content-Type', File::mimeType($pdf));
        //return $pdf->download('itsolutionstuff.pdf');
    }

    public function viewPdf()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $this->generateStyleSheet();
        $this->viewShare($data);
        return view('invoice.index');
    }

    public function generateStyleSheet()
    {
        $cssString = '';
        $blue = 'rgb(50, 138, 241)';
        $red = 'rgb(236, 69, 79)';
        $green = 'rgb(26, 171, 139)';
        $yellow = 'rgb(255, 193, 7)';

        $colors = array(
            'blue' => $blue,
            'red' => $red,
            'green' => $green,
            'yellow' => $yellow
        );
        foreach ($colors as $key => $value) {
            $cssString .= '.text-' . $key . ' {
                color: ' . $value . ';
            }';
            $cssString .= '.bg-' . $key . ' {
                background-color: ' . $value . ';
            }';
            for ($i = 1; $i <= 9; $i++) {
                $lightColor = str_replace(')', ', 0.' . $i . ')', str_replace('rgb', 'rgba', $value));
                $cssString .= '.text-' . $key . '-light-' . $i . ' {
                color: ' . $lightColor . ';
                }';
                $cssString .= '.bg-' . $key . '-light-' . $i . ' {
                background-color: ' . $lightColor . ';
                }';
            }
        }
        file_put_contents(public_path('css/invoice-colors.css'), $cssString);
    }

    public function viewShare($data)
    {
        $css = file_get_contents(public_path('css/app.css'));
        $invoiceColors = file_get_contents(public_path('css/invoice-colors.css'));
        $colors = ['red', 'green', 'blue', 'yellow'];
        view()->share('title', $data['title']);
        view()->share('date', $data['date']);
        view()->share('css', $css);
        view()->share('color', $colors[mt_rand(0, 3)]);
        view()->share('invoiceColors', $invoiceColors);
    }
}
