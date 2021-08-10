import {makeRequest} from "/src/js/post_data.js";

$(function() {

    $("#create_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            login: $("#inputLogin").val(),
            firstName: $("#firstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
        }
        makeRequest('/src/php/response.php', requestData, "POST")
        .then((responseData) => {
  
        });
    });

    $("#delete_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            crudAction : "delete",
            login: $("#inputLoginFindDelete").val()
        }
        makeRequest('/src/php/response.php', requestData, "DELETE")
        .then((responseData) => {

        });
    });

    $("#find_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            login: $("#inputLoginFindDelete").val()
        }
        makeRequest('/src/php/response.php', requestData, "GET")
        .then((responseData) => {
            //display table with user information
        });
    });

    $("#find_update_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            login: $("#inputLoginFindDelete").val()
        }
        makeRequest('/src/php/response.php', requestData, "GET")
        .then((data) => {
            $("#inputLogin").val(data.login);
            $("#inputFirstName").val(data.first_name);
            $("#inputLastName").val(data.last_name);
            $("#inputEmail").val(data.email);     
        });
    });

    $("#update_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            login: $("#inputLogin").val(),
            firstName: $("#firstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
        }
        makeRequest('/src/php/response.php', requestData, "PUT")
        .then((responseData) => {
  
        });
    });
    
});



  
