import {postData} from "/src/js/postData.js";

$(function() {
    $("#find_update_user").click(function(){
        postData('/src/php/response.php', { user: $("#inputLoginFindDelete").val()})
        .then((data) => {
            $("#inputLogin").val(data.login);
            $("#inputFirstName").val(data.first_name);
            $("#inputLastName").val(data.last_name);
            $("#inputEmail").val(data.email);     
        });
    });
});



  
