import {makeRequest, get} from "/src/js/requests.js";

$(function() {

    $("#create_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            login: $("#inputLogin").val(),
            firstName: $("#firstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
            password: $("#inputPassword").val(),
        }
        makeRequest('/api/api.php', requestData, "POST")
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
        makeRequest('/api/api.php', requestData, "DELETE")
        .then((responseData) => {

        });
    });

    $("#find_user").click(function() {
        let requestData = {
            actionType: "crud",
            entityName: "User",
            login: $("#inputLoginFindDelete").val()
        }
        get('/api/api.php')
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
        get('/api/api.php' + "?email=" + requestData.login)
        .then((data) => {
            $("#inputLogin").val(data.login);
            $("#inputFirstName").val(data.first_name);
            $("#inputLastName").val(data.last_name);
            $("#inputEmail").val(data.email);     
        });
    });

    $("#update_user").click(function() {
        let requestData = {
            entityName: "User",
            login: $("#inputLogin").val(),
            firstName: $("#inputFirstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
        }
        makeRequest('/api/api.php', requestData, "PUT")
        .then((responseData) => {
  
        });
    });
    
});



  
