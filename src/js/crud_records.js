import {makeRequest, get} from "/src/js/requests.js";

$(function() {
    const recordsApiPath= "/api/api.php?ent=records";
    const idUrlParameterKey = "&title=";
    $("#createRecord").click(function() {
        let requestData = {
            title: $("#recordInputTitle").val(),
            content: $("#recordInputContent").val(),
        }
        makeRequest(`${recordsApiPath}`, requestData, "POST")
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

    $("#deleteRecord").click(function() {
        let requestData = {
            title: $("#recordFindDeleteTitle").val()
        }
        makeRequest(`${recordsApiPath}`, requestData, "DELETE")
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

    $("#findRecord").click(function() {
        let requestData = {
            title: $("#recordFindDeleteTitle").val()
        }
        console.log(requestData)
        get(`${recordsApiPath}${idUrlParameterKey}${requestData.title}`)
        .then((response) => {
            console.log(response.status);
            
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((responseData) => {
            //display table with record information
        });
    });

    $("#findUpdateRecord").click(function() {
        let requestData = {
            title: $("#recordFindDeleteTitle").val()
        }
        console.log(requestData)
        get(`${recordsApiPath}${idUrlParameterKey}${requestData.title}`)
        .then((response) => {
            console.log(response.status);
            
            if (!response.ok) {
                throw new Error("HTTP status " + response.status);
            }
            return response.json()
        })
        .then((data) => {
            $("#recordInputTitle").val(data[0].title);
            $("#recordInputContent").val(data[0].content);   
        });
    });

    $("#updateRecord").click(function() {
        let requestData = {
            title: $("#recordInputTitle").val(),
            content: $("#recordInputContent").val(),
        }
        makeRequest(`${recordsApiPath}`, requestData, "PUT")
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



  
