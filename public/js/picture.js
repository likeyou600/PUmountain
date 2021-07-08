function show(){
    document.getElementById("loading").style.display = "block";
    document.getElementById("loadingup").style.display = "block";
}
function hide(){
    document.getElementById("loading").style.display = "none";
    document.getElementById("loadingup").style.display = "none";
}
function convertHeicToJpg(input) {
    var blob = $(input)[0].files[0]; //ev.target.files[0];
    heic2any({
        blob: blob,
        toType: "image/jpg",
    })
        .then(function (resultBlob) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(resultBlob);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
            //adding converted picture to the original <input type="file">
            let fileInputElement = $(input)[0];
     
            let container = new DataTransfer();
            let file = new File([resultBlob], "heic" + ".jpg", { type: "image/jpeg"});
            container.items.add(file);  
                
            fileInputElement.files = container.files;
            console.log(fileInputElement.files);      
            hide();
        })
        .catch(function (x) {
            console.log(x.code);
            console.log(x.message);
        });
}

var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
    hide();
};

$("#pic").change(function () {
    show();
    
    var fileName = $(this).val();
    var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
    if (fileNameExt == "heic") {
        convertHeicToJpg(this);
    }
    else {
        loadFile(event);
    }
});
