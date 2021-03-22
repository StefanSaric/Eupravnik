var url = "";
var id = "";
var status = "";
var status_cause = "";
$(document).ready(function() {
    
    $("#activatePatient").click(function() {
        url = $(this).attr("data-url");
        id = $(this).attr("data-id");
        status = $(this).attr("data-status");
        var status_cause = "";
        var csrf_token = $("#csrf_token").val();
        $.ajax({
            url: url, 
            data: {
                _token: csrf_token,
                id:id,
                status:status
            }, 
            type:"POST",
            success: function (result) {
                changeHtmlStaus();
            }
        });
    });
    
    $("#suspendPatient").click(function() {
        url = $(this).attr("data-url");
        id = $(this).attr("data-id");
        status = $(this).attr("data-status");
    	$("#statusCauseInput").html('<textarea id="textarea" class="materialize-textarea" rows="6" cols="30"></textarea><input type="button" id="statusBtn" class="btn mb-6 waves-effect waves-light gradient-45deg-green-teal" value="Sačuvaj">');
        
    }); 
    
    $("#blockPatient").click(function() {
        url = $(this).attr("data-url");
        id = $(this).attr("data-id");
        status = $(this).attr("data-status");
        console.log(url, id);
    	$("#statusCauseInput").html('<textarea id="textarea" class="materialize-textarea" rows="6" cols="30"></textarea><input type="button" id="statusBtn" class="btn mb-6 waves-effect waves-light gradient-45deg-green-teal" value="Sačuvaj">');
        
    });
    
    $("#ac").click(function() {
        url = $(this).attr("data-url");
        id = $(this).attr("data-id");
        status = $(this).attr("data-status");
        console.log(url, id);
    	$("#statusCauseInput").html('<textarea id="textarea" class="materialize-textarea" rows="6" cols="30"></textarea><input type="button" id="statusBtn" class="btn mb-6 waves-effect waves-light gradient-45deg-green-teal" value="Sačuvaj">');
        
    });

});


$(document).on("click", "#statusBtn", function () {
    status_cause = $("#textarea").val();
    var csrf_token = $("#csrf_token").val();
    if(status_cause != "") {
        $.ajax({
            url: url, 
            data: {
                _token: csrf_token,
                id:id,
                status:status,
                status_cause:status_cause
            }, 
            type:"POST",
            success: function (result) {
                changeHtmlStaus();
                
            }
        });
    }
});


function changeHtmlStaus() {
    $("#statusCauseInput").html("");
    var htmlFitstTd = `<i class='material-icons prefix `;
    var statusIcon = `<i class='material-icons prefix `;
    var btnsHtml = ``;
    if(status == "aktivan") {
        htmlFitstTd += `green-text`;
        statusIcon += ``;
        btnsHtml += `green-text`;
        $("#activatePatient").hide();
        $("#suspendPatient").show();
        $("#blockPatient").show();
        $("#statusDivGroup").hide();

    } else if(status == "suspendovan") {
        htmlFitstTd += `orange-text`;
        statusIcon += `orange-text`;
        $("#suspendPatient").hide();
        $("#blockPatient").show();
        $("#activatePatient").show();
    } else {
        htmlFitstTd += `red-text`;
        statusIcon += `red-text`;
        $("#blockPatient").hide();
        $("#suspendPatient").show();
        $("#activatePatient").show();
    }
    htmlFitstTd += `'>beenhere</i>`;
    statusIcon += `'>subject</i>`;

    $("#firstTdInTrGroup").html(htmlFitstTd);
    $("#statusIcon").html(statusIcon);
    $("#secondTdInTrGroup").html(status);
    if(status != "aktivan") {
        $("#statusDivGroup").show();
        $("#statusCauseInDiv").html(status_cause);
    } else {
        $("#statusDivGroup").hide();
    }
}