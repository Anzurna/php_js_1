import {postData} from "/src/js/post_data.js";

$(function() {

    $("#create_user").click(function() {
        let requestData = {
            actionType: "crudUsers",
            crudAction : "create",
            login: $("#inputLogin").val(),
            firstName: $("#firstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
        }
        postData('/src/php/response.php', requestData)
        .then((responseData) => {
  
        });
    });

    $("#delete_user").click(function() {
        let requestData = {
            actionType: "crudUser",
            crudAction : "delete",
            login: $("#inputLoginFindDelete").val()
        }
        postData('/src/php/response.php', requestData)
        .then((responseData) => {

        });
    });

    $("#find_user").click(function() {
        let requestData = {
            actionType: "crudUser",
            crudAction : "find",
            login: $("#inputLoginFindDelete").val()
        }
        postData('/src/php/response.php', requestData)
        .then((responseData) => {
            //display table with user information
        });
    });

    $("#find_update_user").click(function() {
        let requestData = {
            actionType: "crudUser",
            crudAction : "find",
            login: $("#inputLoginFindDelete").val()
        }
        postData('/src/php/response.php', requestData)
        .then((data) => {
            $("#inputLogin").val(data.login);
            $("#inputFirstName").val(data.first_name);
            $("#inputLastName").val(data.last_name);
            $("#inputEmail").val(data.email);     
        });
    });

    $("#update_user").click(function() {
        let requestData = {
            actionType: "crudUser",
            crudAction : "update",
            login: $("#inputLogin").val(),
            firstName: $("#firstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
        }
        postData('/src/php/response.php', requestData)
        .then((responseData) => {
  
        });
    });
    
});



  
