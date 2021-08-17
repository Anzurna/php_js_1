import {makeRequest, get} from "/src/js/requests.js";

$(function() {
    const usersApiPath= "/api/api.php?ent=users";
    const emailUrlParameterKey = "&email=";  

    $("#update_user").click(function() {
        let requestData = {
            login: $("#inputLogin").val(),
            firstName: $("#inputFirstName").val(),
            lastName: $("#inputLastName").val(),
            email: $("#inputEmail").val(),
            password: $("#inputPassword").val(),
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



  
