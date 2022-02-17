<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preview');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // "\t" Таб
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontSize(12);
        $phpWord->setDefaultFontName('Times New Roman');
        $section = $phpWord->addSection();
        $paragraphStyle = array('size'=>12);
        $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt assumenda aliquam expedita deserunt corporis labore, maiores dicta dignissimos molestias tempore dolorum nam exercitationem a optio, id aliquid. Harum, officiis praesentium!';
        $newtext = wordwrap($text, 80, "\n", 1);
        
        $text = explode("\n",$newtext);
        dd($text);
        $textrun = $section->createTextRun();
        $textrun->addText("Объект капитального строительства \t", array('bold'=>true)); 
        $textrun->addLine(array('weight' => 1, 'width' => 1000, 'height' => 1, 'color' => '000000'));
        $textrun->addText($text, array('borderSize'=>100,'pageBreakBefore' => true));
        // $text = "Объект капитального строительства";
        // $fontStyle = array('name'=>'Times New Roman', 'size'=>12, 'bold'=>TRUE);
        // $parStyle = array('align'=>'left','spaceBefore'=>10);

        
        
        // $section->addText(htmlspecialchars($text), $fontStyle,$parStyle);
        // $text2 = "«Дожимная компрессорная станция на УКПГ-1С Заполярного НГКМ (1 очередь)»  (1)";
        // $fontStyle = array('name'=>'Times New Roman', 'size'=>12);
        // $parStyle = array('align'=>'left','spaceBefore'=>10);
        // $section->addText(htmlspecialchars($text2), $fontStyle,$parStyle);
        // $section->addImage("./images/Krunal.jpg");  
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Appdividend.docx');
        return response()->download(public_path('Appdividend.docx'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
