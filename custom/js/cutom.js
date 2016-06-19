function showActivities(){
    // Initiate Variables With Form Content
    //var name = $("#name").val();
    //var email = $("#email").val();
    //var message = $("#message").val();
 
    $.ajax({
        type: "POST",
        url: "index.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            }
        }
    });
}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}