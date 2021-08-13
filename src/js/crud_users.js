import {makeRequest, get} from "/src/js/requests.js";

$(function() {
    const usersApiPath= "/api/api.php?ent=users";
    const emailUrlParameterKey = "&email=";
    $("#create_user").click(function() {
        let requestData = {
            login: $("#inputLogin").val(),
            firstName: $("#inputFirstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
            password: $("#inputPassword").val(),
        }
        makeRequest(`${usersApiPath}`, requestData, "POST")
        .then((response) => {
            console.log(response.status);
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((responseData) => {
  
        });
    });

    $("#delete_user").click(function() {
        let requestData = {
            email: $("#inputEmailFindDelete").val()
        }

        makeRequest(`${usersApiPath}`, requestData, "DELETE")
        .then((response) => {
            console.log(response.status);
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((responseData) => {

        });
    });

    $("#find_user").click(function() {
        let requestData = {
            email: $("#inputEmailFindDelete").val()
        }
        get(`${usersApiPath}${emailUrlParameterKey}${requestData.email}`)
        .then((response) => {
            console.log(response.status);
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((responseData) => {
            //TODO display table with user information
        });
    });

    $("#find_update_user").click(function() {
        let requestData = {
            email: $("#inputEmailFindDelete").val()
        }
        get(`${usersApiPath}${emailUrlParameterKey}${requestData.email}`)
        .then((response) => {
            console.log(response.status);
            
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((responseData) => {
            $("#inputLogin").val(responseData[0].login);
            $("#inputFirstName").val(responseData[0].firstname);
            $("#inputLastName").val(responseData[0].lastname);
            $("#inputEmail").val(responseData[0].email);     
        });
    });

    $("#update_user").click(function() {
        let requestData = {
            login: $("#inputLogin").val(),
            firstName: $("#inputFirstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
            password: $("#inputEmail").val(),
        }
        makeRequest(`${usersApiPath}`, requestData, "PUT")
        .then((response) => {
            console.log(response.status);
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((responseData) => {
  
        });
    });
    
});



  
