function show() {
    document.getElementById("loading").style.display = "block";
    document.getElementById("loadingup").style.display = "block";
}

function hide() {
    document.getElementById("loading").style.display = "none";
    document.getElementById("loadingup").style.display = "none";
}


$("#pic").change(function() {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
});

$("#admin_sendpic1").change(function() {

    var output = document.getElementById('admin_output1');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }

});

$("#admin_returnpic2").change(function() {

    var output = document.getElementById('admin_output2');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }

});

$("#usernewpic").change(function() {

    var output = document.getElementById('usernewpic_output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }

});


// function convertHeicToJpg(input) {
//     var blob = $(input)[0].files[0]; //ev.target.files[0];
//     heic2any({
//         blob: blob,
//         toType: "image/jpg",
//     })
//         .then(function (resultBlob) {
//             var output = document.getElementById('output');
//             output.src = URL.createObjectURL(resultBlob);
//             output.onload = function () {
//                 URL.revokeObjectURL(output.src) // free memory
//             }
//             //adding converted picture to the original <input type="file">
//             let fileInputElement = $(input)[0];

//             let container = new DataTransfer();
//             let file = new File([resultBlob], "heic" + ".jpg", { type: "image/jpeg"});
//             container.items.add(file);  

//             fileInputElement.files = container.files;
//             console.log(fileInputElement.files);      
//             hide();
//         })
//         .catch(function (x) {
//             console.log(x.code);
//             console.log(x.message);
//         });
// }