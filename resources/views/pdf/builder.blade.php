@extends('layouts.app')

@section('content')
<a href="https://github.com/formio/formio.js"><img style="position: absolute; top: 0; right: 0; border: 0;z-index:3000;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"></a>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      {{-- <img height="25px;" style="display: inline;" alt="Form.io" src="https://help.form.io/assets/formio-logo.png"> | JavaScript SDK Library --}}
    </a>

  </div>
</nav>
{{-- <div class="container-fluid">
  <div class="row">
  <div class="col-sm-8">
    <h3 class="text-center text-muted">The <a href="https://github.com/formio/formio.js" target="_blank">Form Builder</a> allows you to build a <select class="form-control" id="form-select" style="display: inline-block; width: 150px;"><option value="form">Form</option><option value="wizard">Wizard</option><option value="pdf">PDF</option></select></h3>
    <div id="builder"></div>
  </div>
  <div class="col-sm-4">
    <h3 class="text-center text-muted">as JSON Schema</h3>
    <div class="card card-body bg-light jsonviewer">
      <pre id="json"></pre>
    </div>
  </div>
</div> --}}

<div  class="container"> 
  <form action="/pdf/builder" method="post">
      @csrf
      <select name="pdf_owner" id="">
        <option value="userid1">Mr. A</option>
        <option value="userid2">Mr. B</option>
        <option value="userid3">Mr. C</option>
      </select>
      <input type="text" name="title" id="" placeholder="pdf title">
      <button id="send" type='button'> Send X</button>
  </form>

  <div id="builder"></div>
</div>





<button id="testtest">Test sdfsdfsdfsdf</button>
<script type="text/javascript">

// $( document ).ready(function() {
//     console.log( "ready!" );
//     var jsonElement = document.getElementById('json');
// var formElement = document.getElementById('formio');
// var subJSON = document.getElementById('subjson');
// var builder = new Formio.FormBuilder(document.getElementById("builder"), {
//   display: 'pdf',
//   components: [],
//   settings: {
//     pdf: {
//       "id": "1ec0f8ee-6685-5d98-a847-26f67b67d6f0",
//       "src": "https://files.form.io/pdf/5692b91fd1028f01000407e3/file/1ec0f8ee-6685-5d98-a847-26f67b67d6f0"
//     }
//   }
// }, {
//   baseUrl: 'https://examples.form.io'
// });
// var onForm = function(form) {
//   form.on('change', function() {
//     subJSON.innerHTML = '';
//     subJSON.appendChild(document.createTextNode(JSON.stringify(form.submission, null, 4)));
//     console.log("Change::: ");
//   });
// };
// var setDisplay = function(display) {
//   builder.setDisplay(display).then(function(instance) {     
//      instance.on('change', function(form) {
//         console.log("Change::: 222");
//     //    if (form.components) {
//     //       formElement.innerHTML = '';
//     //       jsonElement.innerHTML = '';
//     //       jsonElement.appendChild(document.createTextNode(JSON.stringify(form, null, 4)));
//     //       Formio.createForm(formElement, form).then(onForm);
//     //    }
//      });
//      instance.on('saveComponent',function(instance){
//         console.log("testsetsetsetsets");
//         console.log("instance ",instance);
//         console.log("builder ",builder);
        
//         instance.schema = null;
//      })
//    });
// };
// // Handle the form selection.
// var formSelect = document.getElementById('form-select');
// formSelect.addEventListener("change", function() {
//   setDisplay(this.value);
// });
// setDisplay('form');




// $('#testtest').click(function(){

// console.log("############---->",builder.instance.schema);
// });


// });





</script>


</div>
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
@endsection

