jsonvar = {
    "display": "pdf",
    "components": [
        {
            "label": "Text Field",
            "allowMultipleMasks": "false",
            "showWordCount": "false",
            "showCharCount": "false",
            "type": "textfield",
            "input": "true",
            "key": "textField",
            "defaultValue": null,
            "validate": {
                "required": "true",
                "unique": "false",
                "customMessage": null,
                "json": null
            },
            "conditional": {
                "show": null,
                "json": null,
                "when": null
            },
            "overlay": {
                "page": "1",
                "left": "93",
                "top": "21",
                "height": "20",
                "width": "100"
            },
            "inputFormat": "plain",
            "customConditional": null
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