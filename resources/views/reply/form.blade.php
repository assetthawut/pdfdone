@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Pdf Form</h2>
        @foreach ($pdfDatas as $pdfData )
         
            <?php   $pdf_form_empty = $pdfData->pdf_form_answer ?>
        
        @endforeach

        <div id='replyForm'></div>

        <div id="test">Test</div>

    </div>

    <script>
         pdf_form_empty = {!! json_encode($pdf_form_empty) !!};
         pdf_form_empty = JSON.parse(pdf_form_empty)
         console.log(pdf_form_empty);


    </script>
    <script type="text/javascript" src="{{ URL::asset('js/reply.js') }}"></script>
@endsection
