@extends('layouts.app')
@section('content')

    <div class="container">
        <form action="/pdf/builder/" method="post">
            @csrf
            <input type="text" name="title" placeholder="title">
            <input type="text" name="pdfpath" placeholder="pdfpath">
            <select name="pdf_owner_id" id="">
                <option value="a">Mr.A</option>
                <option value="b">Mr.B</option>
                <option value="c">Mr.C</option>
                <option value="d">Mr.D</option>
            </select>
            <button type="submit">Save</button>
        </form>
    </div>
@endsection