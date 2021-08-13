import {makeRequest, get} from "/src/js/requests.js";

$(function() {

    function fillRecordTable(responseData) {
        $("#recordTable").empty();
            for (const element of responseData) {
                $("#recordTable").append(`
                <tr>
                    <th scope="row">${element.id}</th>
                    <td>${element.title}</td>
                    <td>${element.content}</td>
                 </tr>`)
            }
    }

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
            fillRecordTable(responseData);
            
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
            fillRecordTable(responseData);
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



  
