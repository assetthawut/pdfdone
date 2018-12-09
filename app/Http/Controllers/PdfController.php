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
        

        $pdf_form_answer    = json_encode($request->json_components,true);
        $pdf_form_empty     = json_encode($request->json_components_empty,true);


        DB::table('pdfforms')->insert(
            [
                'pdf_owner_id'      => '1',
                'title'             => 'test',
                'pdf_form_answer'   =>  $pdf_form_answer,
                'pdf_form_empty'    =>  $pdf_form_empty,
                'created_at'        =>  Carbon::now(),
                'updated_at'        =>  Carbon::now()
            ]
        );
        return "insert done";

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
