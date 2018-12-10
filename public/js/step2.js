

$( document ).ready(function() {


    
  var subJSON = document.getElementById('subjson');
  var builder = new Formio.FormBuilder(document.getElementById("pdfBuilder"), {
    display: 'pdf',
    components: [],
    settings: {
      pdf: {
        "id": "1ec0f8ee-6685-5d98-a847-26f67b67d6f0",
        "src": pdfpath
      }
    }
  }, {
    baseUrl: 'https://examples.form.io'
  });
  var onForm = function(form) {
    form.on('change', function() {
      subJSON.innerHTML = '';
      subJSON.appendChild(document.createTextNode(JSON.stringify(form.submission, null, 4)));
     // console.log("Change::: ");
    });
  };
  var setDisplay = function(display) {
    builder.setDisplay(display).then(function(instance) {     
       instance.on('change', function(form) {
          console.log("Change::: 222");
       });
       instance.on('saveComponent',function(instance){

          
          instance.schema = null;
       })
  
      // send function 
  
       $('#send').click(function(){    
          temp = {}
          temp = builder
          builder = temp;
        
          

          components = builder.instance.schema.components;
          emptySchema = temp.instance.schema;
  
  
          emptyComponents = []
          for(key in components){
  
    
              components[key].defaultValue = '';
              emptyComponents[key] = components[key]; 
          }
  
  
         
          Object.unfreeze=function(o){
              var oo=undefined;
               if( o instanceof Array){
                       oo=[];var clone=function(v){oo.push(v)};
                       o.forEach(clone); 
               }else if(o instanceof String){
                  oo=new String(o).toString();
             }else  if(typeof o =='object'){
       
                oo={};
               for (var property in o){oo[property] = o[property];}
       
       
               }
               return oo;
        }
  
      //   Object.freeze(emptySchema)


        emptySchema = Object.unfreeze(emptySchema);
        emptySchema.components = emptyComponents
  
        builderTemp = builder.instance.schema

     

        console.log(" builderTemp => ",builderTemp);
        console.log(" emptySchema => ",emptySchema);

        debugger
        
          $.ajax({
              url     : '/pdf/form/create/pdfbyid',
              method  : 'post',
              dataType: "JSON",
              data    : {
                  pdf_owner               : "1",
                  pdf_id                  : pdf_id,
                  title                   : "Test",
                  type_id                 : $("#pdftype option:selected" ).val(),
                  json_components         : builderTemp,
                  json_components_empty   : emptySchema
              },
              headers:
              {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success : function(response){
                  
                  console.log(response);
              },
              error: function (error) {
                 console.log(error);
              }
          });
  });
  
     });
  };
  // Handle the form selection.
  var formSelect = document.getElementById('form-select');
  setDisplay('pdf');


  });
  
  
  