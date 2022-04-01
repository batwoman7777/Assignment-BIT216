function memType(mtype) {
    // 1 = member , 2= trainder
    $("#selmemtype").val(mtype);

}
//check if it display teh right value
function showID() {
    var selectedValue = $("#selmemtype").val();
    //alert(singleValues);

}


//member registeraion
function formSubmitm($usertype) {
    //var name = document.getElementById("name").value;
    var musername = $("#musername").val();
    var pwd = $("#mpassword").val();
    var fname = $("#mfullname").val();
    var memail = $("#memail").val();
    var mlevel = $("#level").val();
    //"1">Beginner</option>
    //"2">Advanced</option>
    //"3">Expert</option>
    var dataString = 'name=' + musername + '&pwd=' + pwd + '&fname=' + fname + '&memail=' + memail + '&mlevel=' + mlevel + '&utype=' + $usertype;
    $.ajax({
        type: "POST",
        url: "ssignup.php",
        data: dataString,
        success: function (response) {
            //after success display teh msg
            alert("Successfully Registered!");
            window.location = "Login.php";
        }

    });
    event.preventDefault();

}
//tariner registeration
function formSubmitT($usertype) {

    //var name = document.getElementById("name").value;
    var tusername = $("#tusername").val();
    var pwd = $("#tpwd").val();
    var fname = $("#tfullname").val();
    var temail = $("#temail").val();
    var tspecialty = $("#tspecialty").val();
    //"1">Beginner</option>
    //"2">Advanced</option>
    //"3">Expert</option>
    var dataString = 'name=' + tusername + '&pwd=' + pwd + '&fname=' + fname + '&memail=' + temail + '&tspecialty=' + tspecialty + '&utype=' + $usertype;
    $.ajax({
        type: "POST",
        url: "tsignup.php",
        data: dataString,
        success: function (response) {
            //after success display teh msg
            alert("Successfully Registered!");
            window.location = "Login.php";
        }

    });
    event.preventDefault();

}

/*
 * function to togle  the personal and group option
 *
 */
function  showGroupDiv() {
    //$("#group").fadeToggle( "slow", "linear" );
    $("#group").fadeIn("slow");
}
function hideGroup() {
    $("#group").fadeOut("slow");
}

//the model in resgiter session for members
function loadModel(id) {
    var dataString = 'id=' + id
    $.ajax({
        type: "POST",
        url: "registerProgrammeModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();
}

//register user for the seesion
function registerUser(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "registerUser.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert(response);
        }

    });
    event.preventDefault();
}
// update trainer submited data
function loadModelUpdateTrainer(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "loadModelUpdateQualification.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();

}
//update trainer set date through model
function updateTraningSession(id) {
    var umax = $("#umax").val();
    var umin = $("#umin").val();
    var uqualification = $("#uqualification").val();
    var dataString = 'sessionid=' + id + '&umax=' + umax + '&umin=' + umin + '&uqualification=' + uqualification;
    $.ajax({
        type: "POST",
        url: "updateQualificationModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Data Updated Successfully!");
            location.reload();
        }

    });
    event.preventDefault();
}

//accept trainer set date through model
function reviewApplication(id) {
    var ustatus = $("#ustatus").val();
    var dataString = 'sessionid=' + id + '&ustatus=' + ustatus;
    $.ajax({
        type: "POST",
        url: "reviewApplicationModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Data Updated Successfully!");
            location.reload();
        }

    });
    event.preventDefault();
}

// update trainer submited data
function loadModelReviewApplication(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "loadModelReviewApplication.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();

}

//load the member rewviwe model

function loadModelReviewMember(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "loadModelReviewMember.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();
}

//accept trainer set date through model
function addQualification(id) {
    var uqualifications = $("#uqualifications").val();
    var dataString = 'sessionid=' + id  + '&uqualifications=' + uqualifications;
    $.ajax({
        type: "POST",
        url: "addQualificationModel.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Data Updated Successfully!");
            location.reload();
        }

    });
    event.preventDefault();
}

// update trainer submited data
function loadModelRegisterProgramme(sessionid) {
    var dataString = 'sessionid=' + sessionid;
    $.ajax({
        type: "POST",
        url: "loadModelRegisterProgramme.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            $("#content").html(response);//
        }

    });
    event.preventDefault();

}

//record user Review to Database
function recordReview(uniqueid, sessionID) {
    var comment = $("#rmessage").val();
    var rrate = $("#rrate:checked").val();
    var dataString = 'uniqueid=' + uniqueid + '&sessionID=' + sessionID + '&comment=' + comment + '&rrate=' + rrate;
    $.ajax({
        type: "POST",
        url: "recordReview.php",
        data: dataString,
        success: function (response) {
            //change the model after click
            alert("Review Successfully Recorded!");
        }

    });
    event.preventDefault();
}

// validate function for record Traning session
function valideatRecordTraining() {
    var mtitle = $("#title").val();// need to be string
    if (!isNaN(mtitle)) {
        $("#mtitle").text("Title should be a text!");
    }else{
        $("#mtitle").text("");
    }
    var mdate = $("#date").val(); //need to be valid date
    var mdatecheck = Date.parse(mdate);
    if (!isNaN(mdatecheck) === false || mdate == " ") {
        $("#mdate").text("Please enter a date!");
    }else{
        $("#mdate").text("");
    }
    var mtime = $("#time").val(); // valide time
    if (isNaN(mtime) == false || mtime == " ") {
        $("#mtime").text("Please enter a time!");
    }else{
         $("#mtime").text("");
    }
    var mfee = $("#fee").val();//need to be a number


}
