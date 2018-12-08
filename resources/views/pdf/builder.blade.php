@extends('layouts.app')

@section('content')
<a href="https://github.com/formio/formio.js"><img style="position: absolute; top: 0; right: 0; border: 0;z-index:3000;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"></a>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      {{-- <img height="25px;" style="display: inline;" alt="Form.io" src="https://help.form.io/assets/formio-logo.png"> | JavaScript SDK Library --}}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav nav-fill">
        <li class="nav-item px-3 "><a class="nav-link" href="/formio.js"><i class="fa fa-home"></i></a></li>
        <li class="nav-item px-3 active bg-white border"><a class="nav-link" href="app/builder"><i class="fa fa-th-list"></i> Form Builder</a></li>
        <li class="nav-item px-3 "><a class="nav-link" href="app/examples"><i class="fa fa-check-square-o"></i> Examples</a></li>
        <li class="nav-item px-3"><a class="nav-link" target="_blank" href="https://github.com/formio/formio.js/wiki"><i class="fa fa-book"></i> Documentation</a></li>
        <li class="nav-item px-3 "><a class="nav-link" href="app/sdk"><i class="fa fa-list-alt"></i> SDK</a></li>
      </ul>
      <ul class="navbar-nav float-right mt-3">
        <li class="nav-item"><a class="github-button nav-link" href="https://github.com/formio/formio.js" data-size="large" data-show-count="true" aria-label="Star formio/formio.js on GitHub">Star</a></li>
        <li class="nav-item"><a class="github-button nav-link" href="https://github.com/formio/formio.js/fork" data-size="large" data-show-count="true" aria-label="Fork formio/formio.js on GitHub">Fork</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
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
</div>
<div class="row mt-4">
  <div class="col-sm-8 offset-sm-2">
    <h3 class="text-center text-muted">which <a href="https://github.com/formio/ngFormio" target="_blank">Renders as a Form</a> in your Application</h3>
    <div id="formio" class="card card-body bg-light"></div>
  </div>
  <div class="clearfix"></div>
</div>
<div class="row mt-4">
  <div class="col-sm-8 offset-sm-2">
    <h3 class="text-center text-muted">which creates a Submission JSON</h3>
    <div class="card card-body bg-light jsonviewer">
      <pre id="subjson"></pre>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<div class="row mt-4">
  <div class="col-sm-10 offset-sm-1 text-center">
    <h3 class="text-center text-muted">which submits to our API Platform</h3>
    <p>hosted or on-premise</p>
    <a href="https://form.io" target="_blank"><img style="width:100%" src="https://help.form.io/assets/img/formioapi2.png" /></a>
  </div>
</div>
<div class="row" style="margin-top: 40px;">
  <div class="col-sm-12 text-center">
    <a href="https://form.io" target="_blank" class="btn btn-lg btn-success">Get Started</a>
  </div>
</div>
<div class="row card card-body bg-light mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading">We are Open Source!</h2>
        <h3 class="section-subheading text-muted">We are proud to offer our core Form &amp; API platform as Open Source.</h3>
        <h3 class="section-subheading text-muted">Find us on GitHub @ <a href="https://github.com/formio/formio" target="_blank">https://github.com/formio/formio</a></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"><a href="https://github.com/formio/formio" target="_blank"><img class="img-responsive" src="https://form.io/assets/images/github-logo.png" /></a></div>
      <div class="col-md-8">
        <p>Getting started is as easy as...</p>
        <pre style="background-color: white;">git clone https://github.com/formio/formio.git
cd formio
npm install
node server</pre>
      </div>
    </div>
  </div>
</div>

<button id="testtest">Test sdfsdfsdfsdf</button>
<script type="text/javascript">

$( document ).ready(function() {
    console.log( "ready!" );
    var jsonElement = document.getElementById('json');
var formElement = document.getElementById('formio');
var subJSON = document.getElementById('subjson');
var builder = new Formio.FormBuilder(document.getElementById("builder"), {
  display: 'pdf',
  components: [],
  settings: {
    pdf: {
      "id": "1ec0f8ee-6685-5d98-a847-26f67b67d6f0",
      "src": "https://files.form.io/pdf/5692b91fd1028f01000407e3/file/1ec0f8ee-6685-5d98-a847-26f67b67d6f0"
    }
  }
}, {
  baseUrl: 'https://examples.form.io'
});
var onForm = function(form) {
  form.on('change', function() {
    subJSON.innerHTML = '';
    subJSON.appendChild(document.createTextNode(JSON.stringify(form.submission, null, 4)));
    console.log("Change::: ");
  });
};
var setDisplay = function(display) {
  builder.setDisplay(display).then(function(instance) {     
     instance.on('change', function(form) {
        console.log("Change::: 222");
    //    if (form.components) {
    //       formElement.innerHTML = '';
    //       jsonElement.innerHTML = '';
    //       jsonElement.appendChild(document.createTextNode(JSON.stringify(form, null, 4)));
    //       Formio.createForm(formElement, form).then(onForm);
    //    }
     });
     instance.on('saveComponent',function(instance){
        console.log("testsetsetsetsets");
        console.log("instance ",instance);
        console.log("builder ",builder);
        
        instance.schema = null;
     })
   });
};
// Handle the form selection.
var formSelect = document.getElementById('form-select');
formSelect.addEventListener("change", function() {
  setDisplay(this.value);
});
setDisplay('form');




$('#testtest').click(function(){

console.log("############---->",builder.instance.schema);
});


});





</script>


</div>
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
@endsection

