@extends('layouts.app')
@section('content')
    <div class="container">   
        <form action="">
            <select name="" id="pdftype">
                <option value="0">QA</option>
                <option value="1">Exer</option>
            </select>
        </form>    
        <button type="button" id="send">Send</button>
         <div id="pdfBuilder"></div>    
         @foreach ($pdfDatas as $pdfData)
             <?php  $pdfpath = $pdfData->pdfpath ?>
         @endforeach
    </div>
    <script>
        pdfpath = {!! json_encode($pdfpath) !!};
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/step2.js') }}"></script>
@endsection
