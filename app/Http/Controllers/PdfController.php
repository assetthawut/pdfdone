<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show builder 
        return view('pdf.builder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pdf.createpdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // How to use object  $request->json_components;
        //
        

        // $pdf_form_answer    = json_encode($request->json_components,true);
        // $pdf_form_empty     = json_encode($request->json_components_empty,true);


        // DB::table('pdfforms')->insert(
        //     [
        //         'pdf_owner_id'      => '1',
        //         'title'             => 'test',
        //         'pdf_form_answer'   =>  $pdf_form_answer,
        //         'pdf_form_empty'    =>  $pdf_form_empty,
        //         'created_at'        =>  Carbon::now(),
        //         'updated_at'        =>  Carbon::now()
        //     ]
        // );
        // return "insert done";

        DB::table('pdfs')->insert(
            [
                'title'         => $request->input('title'),
                'pdf_owner_id'  => $request->input('pdf_owner_id'),
                'pdfpath'       => $request->input('pdfpath'),
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now()
            ]
        );

        $lastInsertId = DB::getPdo()->lastInsertId();
        return redirect('/pdf/form/create/pdfbyid/'.$lastInsertId);
        

    }


    public function createPdfById(Request $request){

        // get form 
        // $id is lastinsert id;
        $id = $request->id;
        $pdfDatas = DB::table('pdfs')->where('id',$id)->get();

        return view('pdf.createpdfstep2',['pdfDatas' => $pdfDatas]);      
    }

    public function storePdfById(Request $request){

    //    if( isset($json_components['components']) != true) {
    //         $request->json_components['components'] = [];
    //    }
    //    return $request->json_components;



  
       
       // Store to pdfforms table
       $pdf_owner_id       = $request->pdf_owner;      
       $pdf_id             = $request->pdf_id;
       $title              = $request->title;
       $type_id            = $request->type_id;
       $pdf_form_answer    = json_encode($request->json_components,true);
       $pdf_form_empty     = json_encode($request->json_components_empty,true);

        //  $pdf_form_answer['test'] = 2555;
        //  return $pdf_form_answer;
        
        $obj = json_decode($pdf_form_answer, TRUE);
        

        foreach($obj as $key=>$value){

            $obj['5555555'] = "5555555";
            print_r($obj);
            
        }

        return;

       DB::table('pdfforms')->insert(
           [
                'pdf_owner_id'          =>  $pdf_owner_id,
                'pdf_id'                =>  $pdf_id, 
                'title'                 =>  $title ,
                'pdf_form_answer'       =>  $pdf_form_answer,
                'pdf_form_empty'        =>  $pdf_form_empty,
                'type_id'               =>  $type_id ,
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now()
           ]
           );

        return "insert Done";

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


    public function showjson(){

        $data = DB::table('pdfforms')->select('pdf_form_answer')->where('id',12)->get();

        foreach($data as $key){

            $test = $key->pdf_form_answer;
        }
        return $test;
    }
}
