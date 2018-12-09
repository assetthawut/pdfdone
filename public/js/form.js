jsonvar = {
    "display": "pdf",
    "components": [
        {
            "input": "true",
            "key": "textField",
            "label": "Text Field",
            "type": "textfield",
            "overlay": {
                "page": "1",
                "left": "961",
                "top": "453",
                "height": "20",
                "width": "100"
            }
        },
        {
            "input": "true",
            "key": "textField2",
            "label": "Text Field",
            "type": "textfield",
            "overlay": {
                "page": "1",
                "left": "961",
                "top": "493",
                "height": "20",
                "width": "100"
            }
        },
        {
            "input": "true",
            "key": "textField3",
            "label": "Text Field",
            "type": "textfield",
            "overlay": {
                "page": "1",
                "left": "963",
                "top": "551",
                "height": "20",
                "width": "100"
            }
        },
        {
            "input": "true",
            "key": "textField4",
            "label": "Text Field",
            "type": "textfield",
            "overlay": {
                "page": "1",
                "left": "963",
                "top": "580",
                "height": "20",
                "width": "100"
            }
        },
        {
            "input": "true",
            "key": "textField5",
            "label": "Text Field",
            "type": "textfield",
            "overlay": {
                "page": "1",
                "left": "962",
                "top": "604",
                "height": "20",
                "width": "100"
            }
        }
    ],
    "settings": {
        "pdf": {
            "id": "1ec0f8ee-6685-5d98-a847-26f67b67d6f0",
            "src": "https://files.form.io/pdf/5692b91fd1028f01000407e3/file/1ec0f8ee-6685-5d98-a847-26f67b67d6f0"
        }
    }
}

console.log('== form js ==');
window.onload = function () {
    Formio.createForm(document.getElementById('formio'),
        jsonvar
    ).then(function (form) {
        form.on('submit', (submission) => {
            console.log('The form was just submitted!!!');
            console.log("submission ", submission);
            alert("Hey");
        });

    });
};