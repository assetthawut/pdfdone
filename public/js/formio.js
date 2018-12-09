// console.log("sdfsdfsdfsdfsdf 55555");

$( document ).ready(function() {
  //  console.log( "ready!" );
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
   // console.log("Change::: ");
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
        // console.log("testsetsetsetsets");
        // console.log("instance ",instance);
        // console.log("builder ",builder);
        
        instance.schema = null;
     })

    // send function 

     $('#send').click(function(){    
        temp = {}
        temp = builder
        builder = temp;

        // console.log("buil:: ",builder);
        // console.log("instance:: ",instance);
        components = builder.instance.schema.components;
        emptySchema = temp.instance.schema;


        emptyComponents = []
        for(key in components){

            // console.log("Key: ",key);
            components[key].defaultValue = '';
            emptyComponents[key] = components[key]; 
        }


        

        // console.log("emptySchema: ",emptySchema);
        // console.log("emptyComponents: ",emptyComponents);
        
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




        $.ajax({
            url     : '/pdf/builder',
            method  : 'post',
            data    : {
                pdf_owner               : $('select[name=pdf_owner]').val(),
                title                   : $("input[name=title]").val(),
                json_components         : builder.instance.schema,
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
// formSelect.addEventListener("change", function() {
//   setDisplay(this.value);
// });
setDisplay('pdf');




$('#testtest').click(function(){

 // console.log("############---->",builder.instance.schema);
});





// $('#send').click(function(){    

//         console.log("buil:: ",builder);
//         console.log("instance:: ",instance);
//         components = builder.instance.schema.components;
//         emptySchema = builder.form;


//         emptyComponents = []
//         for(key in components){

//             // console.log("Key: ",key);
//             components[key].defaultValue = '';
//             emptyComponents[key] = components[key]; 
//         }

//         emptySchema.components = "sdfsdfsdfsdf";
//         console.log("empty: ",emptySchema);
        

//         $.ajax({
//             url     : '/pdf/builder',
//             method  : 'post',
//             data    : {
//                 pdf_owner               : $('select[name=pdf_owner]').val(),
//                 title                   : $("input[name=title]").val(),
//                 json_components         : builder.instance.schema,
//                 json_components_empty   : emptySchema
//             },
//             headers:
//             {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             success : function(response){
                
//                 console.log(response);
//             }
//         });
// });


});


