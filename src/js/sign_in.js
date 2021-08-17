import {makeRequest, get} from "/src/js/requests.js";

$(function() {
    const signInApiPath= "/api/sign_in.php"; 

    $("#sign_in").click(function() {
        let requestData = {
            email: $("#inputEmail").val(),
            password: $("#inputPassword").val(),
        }
        makeRequest(`${signInApiPath}`, requestData, "POST")
        .then((response) => {
            console.log(response.status);
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);             
            }
            else {
                window.location.href = "/p/administration.php";
            }
        })
    });
    
});



  
