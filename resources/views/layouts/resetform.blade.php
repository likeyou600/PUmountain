<script>

$('#changennicknamemodal').on('hidden.bs.modal', function () {
   $('#changennickname').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
});
$('#changenpicturemodal').on('hidden.bs.modal', function () {
   $('#change_profilepicture').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
   $('#usernewpic_output').removeAttr("src");
});
$('#changenpasswordmodal').on('hidden.bs.modal', function () {
   $('#changenpassword').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
});
$('#addnewmodal').on('hidden.bs.modal', function () {
   $('#addnew').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
   $('#output').removeAttr("src");
});
$('#deleteitemmodal').on('hidden.bs.modal', function () {
   $('#deleteitem').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
});
$('#admincanclemodal').on('hidden.bs.modal', function () {
   $('#admincancle').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
});
$('#adminreturnpicmodal').on('hidden.bs.modal', function () {
   $('#adminreturnpic').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
   $('#admin_output2').removeAttr("src");

});
$('#adminsendpicmodal').on('hidden.bs.modal', function () {
   $('#adminsendpic').find('input[type=text], input[type=password],input[type=file], input[type=number], input[type=email], textarea').val('');
   $('#admin_output1').removeAttr("src");
});

</script>