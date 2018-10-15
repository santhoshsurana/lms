// JavaScript Document
var loadimg = "<img src='img/loading.gif' alt='loading' longdesc='img/loading.gif'>";
var tests_array = {
	1:"test/bloodexamination.php", 
	2:"test/urineexamination.php", 
	3:"test/bloodbank.php", 
	4:"test/biochemistry.php", 
	5:"test/serumelectrolytes.php", 
	6:"test/serology.php", 
	7:"test/csfanalysis.php", 
	8:"test/semenanalysis.php", 
	9:"test/stoolexamination.php", 
	10:"test/adalevels.php",
    11:"test/cholinesterase.php",
    12:"test/plasmafibrinogen.php",
    13:"test/glucosetolerance.php",
	99:"test/customtest.php"
	};
$(document).ready(function () {
    $(".adminOnly").hide();
	var permission=returnAjax('GET', 'class/admin.class.php');
	if (permission == 0) {
            $(".adminOnly").show();
			display('home.php');
        }else{
			$(".adminOnly").show();
			$("#home").html("<a href='#'  onClick="+"display('createpatient.php');"+"><i class='icon-home'></i> Home</a>");
			display('createpatient.php');
		}
    startTime();
});

$(function () {
    $(document).bind("contextmenu", function (e) {
        e.preventDefault();
    });
});

$(window).load(function () {
    sticky_relocate();
});
$(window).scroll(function () {
    sticky_relocate();
});

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    // var div_top = $('header').height();
    if (window_top > 10) {
        $('header').addClass('top-header');
    } else {
        $('header').removeClass('top-header');
    }
}

function charChk(evt, regtype) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    if (key == 37 || key == 39 || key == 8 || key == 46) { // Left, Right, Backspace, Delete keys
        return;
    }
    key = String.fromCharCode(key);
    var regex = '';
    if (regtype == 'num') {
        regex = /[0-9]+$/;
    } else if (regtype == 'alpha') {
        regex = /^[a-zA-Z]+$/;
    } else if (regtype == 'alphanum') {
        regex = /^[a-zA-Z0-9]+$/;
    } else if (regtype == 'email') {
        regex = /^[a-zA-Z0-9\.\@]+$/;
    } else if (regtype == 'name') {
        regex = /^[a-zA-Z\s]+$/;
    } else if (regtype == 'nr') {
        regex = /^[a-zA-Z0-9\.\-\+\s]+$/;
    }
    if (!regex.test(key)) {
        theEvent.preventDefault();
        if (theEvent.preventDefault) {
            theEvent.preventDefault();
        }
    }
}

function showError(show, type, text) {
    if (type == 0) {
        $('#error').removeClass('alert-success alert-warning alert-info').addClass('alert-error');
        $('#error_title').html('Failed!');
        $('#errorTxt').removeClass('text-success text-warning text-info').addClass('text-error');
    } else if (type == 1) {
        $('#error').removeClass('alert-error alert-warning alert-info').addClass('alert-success');
        $('#error_title').html('Success!');
        $('#errorTxt').removeClass('text-error text-warning text-info').addClass('text-success');
    } else if (type == 2) {
        $('#error').removeClass('alert-success alert-error alert-info').addClass('alert-warning');
        $('#error_title').html('Warning!');
        $('#errorTxt').removeClass('text-success text-error text-info').addClass('text-warning');
    } else if (type == 3) {
        $('#error').removeClass('alert-success alert-warning alert-error').addClass('alert-info');
        $('#error_title').html('Notification!');
        $('#errorTxt').removeClass('text-success text-warning text-error').addClass('text-info');
    }
    if (show == 1) {
        $('#error').show().fadeOut(5000);
    } else {
        $('#error').hide();
    }
    $('#errorTxt').html(text + '\n');
}

function returnAjax(typeOpt, varRequestUrl, dataStr) { //common ajax request function						
    return response = $.ajax({
        url: varRequestUrl,
        type: typeOpt,
        data: dataStr,
        async: false,
        success: function (result) {}
    }).responseText;

    //return response;							
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var a = "AM";
    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    if (h > 12) {
        h = h - 12;
        a = "PM";
    }
    $("#time").html(h + ":" + m + ":" + s + " " + a);
    t = setTimeout(function () {
        startTime()
    }, 500);
}


function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function printer() {
    var page = $("#report_div").html();
    var printpage1 = window.open('', 'LMS report');
    printpage1.document.write("<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width' /><title>Lab Management system Report</title><link rel='stylesheet' type='text/css' href='css/bootstrap.css'><link rel='stylesheet' type='text/css' href='css/bootstrap-responsive.css'><link rel='stylesheet' type='text/css' href='css/style.css'><link rel='icon' href='img/favicon.ico'></head><body>");
    printpage1.document.write(page);
    printpage1.document.write("</body></html>");
    printpage1.print();
   // printpage1.close();
}

function display(url) {
    $("#data").html(loadimg);
	var result = returnAjax('GET', url);
	$("#data").html(result);
}

function showTest() {
    if ($('#test_type').val() == '1') {
        $("#showTest").show();
    } else {
        $("#showTest").hide();
    }
}

function searchEngine() {
    var searchkey = $("#search").val();
	display("class/search.class.php?searchkey="+searchkey);
}

function ViewResults(url) {
    var fromDate = $("#from_date").val();
	var toDate = $("#to_date").val();
	display(url+'&fromDate='+fromDate+'&toDate='+toDate);
}

function showCreatetest(patientId) {
    $("#data").html(loadimg);
    $.get("createtest.php", function (data) {
        $("#data").html(data);
        $("#patient_id").val(patientId);
    });
}

function logIn() {
    var username = $("#username").val();
    var password = $("#password").val();
    if (username != '' && password != '') {
        $.ajax({
            type: "POST",
            url: "class/login.class.php",
            data: {
                username: username,
                password: password
            },
            success: function (result) {
                console.log(result);
                if (result == 1) {
                    document.location.href = 'index.php';
                } else {
                    showError('1', '0', 'user details not found tryagain!');
                }
            },
        });
    } else {
        showError('1', '0', 'login feilds are empty?');
    }
}

function createUser() {
    var username = $("#username").val();
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    var role = $("#role").val();
    if (username != '' && password != '') {
        if (password == repassword) {
            $.ajax({
                type: "POST",
                url: "class/createuser.class.php",
                data: {
                    username: username,
                    password: password,
                    role: role
                },
                success: function (result) {
                    display('class/viewuser.class.php');
                    showError('1', '1', result);
                },
            });
        } else {
            showError('1', '0', 'Password mismatch please tryagain!');
        }
    } else {
        showError('1', '0', 'Please fill all empty feilds!');
    }
}

function editUser(userId) {
    $("#data").html(loadimg);
    $.get("edituser.php", {
        userId: userId
    }, function (data) {
        $("#data").html(data);
    });
}

function updateUser(userId) {
    var password = $("#password").val();
    var repassword = $("#repassword").val();
    if (password != '' && repassword != '') {
        if (password == repassword) {
            $.get("class/updateuser.class.php", {
                userId: userId,
                password: password
            }, function (data) {
                display('class/viewuser.class.php');
            });
        } else {
            showError('1', '0', 'password mismatch!');
        }
    } else {
        showError('1', '0', 'Please fill all empty feilds!');
    }
}

function deleteUser(userId) {
   var accept=confirm('Do you want to delete this entry permanently?');
	if(accept==true){
    $.ajax({
        type: "POST",
        url: "class/deleteuser.class.php",
        data: {
            userId: userId
        },
        success: function (result) {
            display('class/viewuser.class.php');
            showError('1', '1', result);
        },
    });
	}
}

function createPatient() {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var age = $("#age").val();
    if ($('#genderM').is(':checked') == true) {
        var gender = 1;
    } else {
        var gender = 0;
    }
    var phone = $("#phone").val();
    var ref = $("#ref").val();
    if (phone != "") {
        if (phone.length != 10) {
            showError('1', '0', 'Phone number must be 10 characters!');
            return false;
        }
    }
    if (firstname != "" && lastname != "" && age != "") {
        $.ajax({
            type: "POST",
            url: "class/createpatient.class.php",
            data: {
                firstname: firstname,
                lastname: lastname,
                age: age,
                gender: gender,
                phone: phone,
                ref: ref
            },
            success: function (result) {
                display('class/viewpatient.class.php');
                showError('1', '1', result);
            },
        });
    } else {
        showError('1', '0', 'Please fill all empty feilds!');
    }
}

function editPatient(patientId) {
    $("#data").html(loadimg);
    $.get("editpatient.php", {
        patientId: patientId
    }, function (data) {
        $("#data").html(data);
    });
}

function updatePatient(patientId) {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var age = $("#age").val();
    if ($('#genderM').is(':checked') == true) {
        var gender = 1;
    } else {
        var gender = 0;
    }
    var phone = $("#phone").val();
    var ref = $("#ref").val();
    if (phone != "") {
        if (phone.length != 10) {
            showError('1', '0', 'Phone number must be 10 characters!');
            return false;
        }
    }
    if (firstname != "" && lastname != "" && age != "") {
        $.ajax({
            type: "POST",
            url: "class/updatepatient.class.php",
            data: {
                firstname: firstname,
                lastname: lastname,
                age: age,
                gender: gender,
                phone: phone,
                ref: ref,
                patientId: patientId
            },
            success: function (result) {
                display('class/viewpatient.class.php');
                showError('1', '1', result);
            },
        });
    } else {
        showError('1', '0', 'Please fill all empty feilds!');
    }
}

function deletePatient(patientId) {
	var accept=confirm('Do you want to delete this entry permanently?');
	if(accept==true){
    $.ajax({
        type: "POST",
        url: "class/deletepatient.class.php",
        data: {
            patientId: patientId
        },
        success: function (result) {
            display('class/viewpatient.class.php');
            showError('1', '1', result);
        },
    });
	}
}
function deleteTest(testId, testType) {
	var accept=confirm('Do you want to delete this entry permanently?');
	if(accept==true){
    $.ajax({
        type: "POST",
        url: "class/deletetest.class.php",
        data: {
            testId: testId
        },
        success: function (result) {
			if(testType==1){
            display('class/viewtest.class.php');
			}else{
				display('class/viewmedics.class.php');
			}
            showError('1', '1', result);
        },
    });
	}
}
function patientIdChk() {
    var patient_id = $("#patient_id").val();
	if (patient_id == '') {
        showError('1', '0', 'please enter patient ID!');
        $("#patient_id").focus();
        return false;
    }
    var url = 'class/getpatients.php';
    var data = 'id=' + patient_id;
    var result = returnAjax('GET', url, data);
    if (result == 0) {
        showError('1', '0', 'Patient not exist!');
        $("#patient_id").focus();
        return false;
    }
}

function createTest() {
    var test_type = $("#test_type").val();
    var test_name = $("#test_name").val();
    var patient_id = $("#patient_id").val();
    var total_amount = $("#total_amount").val();
    var paid_amount = $("#paid_amount").val();
    var due_amount = total_amount - paid_amount;
    if (test_type != '' && test_name != '' && patient_id != '' && total_amount != '' && paid_amount != '') {
        if (total_amount >= paid_amount) {
            $.ajax({
                type: "POST",
                url: "class/createtest.class.php",
                data: {
                    test_type: test_type,
                    test_name: test_name,
                    patient_id: patient_id,
                    total_amount: total_amount,
                    paid_amount: paid_amount,
                    due_amount: due_amount
                },
                success: function (result) {
                    if (test_type == 0) {
                        display('class/viewmedics.class.php');
                    } else {
                        display('class/viewtest.class.php');
                    }
                    showError('1', '1', 'Test created successfully!');
                },
            });
        } else {
            showError('1', '0', 'paid amount should not exceed total amount!');
        }
    } else {
        showError('1', '0', 'Please fill all empty feilds!');
    }
}

function editTest(testId) {
    $("#data").html(loadimg);
    $.get("edittest.php", {
        testId: testId
    }, function (data) {
        $("#data").html(data);
    });
}

function updateTest(testId) {
    var test_type = $("#test_type").val();
    var total_amount = $("#total_amount").val();
    var paid_amount = $("#paid_amount").val();
    if (total_amount != '' && paid_amount != '') {
        if (total_amount >= paid_amount) {
            $.ajax({
                type: "POST",
                url: "class/updatetest.class.php",
                data: {
                    total_amount: total_amount,
                    paid_amount: paid_amount,
                    testId: testId
                },
                success: function () {
                    if (test_type == 0) {
                        display('class/viewmedics.class.php');
                    } else {
                        display('class/viewtest.class.php');
                    }
                    showError('1', '1', 'Test updated successfully!');
                },
            });
        } else {
            showError('1', '0', 'paid amount should not exceed total amount!');
        }
    } else {
        showError('1', '0', 'Please fill all empty feilds!');
    }
}

function customTest(testId){
	var testName = $("#test_name").val();
	var dataStr = 'testId='+testId+'&test_name='+testName;
	var data = returnAjax('POST', "class/customtest.class.php", dataStr);
	var url=tests_array[testName];
	$("#testDiv").load(url+' #test_div', 'testId='+testId );
	
}
function updateNR(NRid) {
    var NRvalue = $('#NR' + NRid).val();
    var NRold = $('#NR' + NRid + '_sys').val();
    if (NRvalue != NRold) {
        var NRpat = /^[0-9-. ]*$/;
        if (NRpat.test(NRvalue)) {
            $.get("class/updatenr.class.php", {
                NRid: NRid,
                NRvalue: NRvalue
            }, function (data) {
                $("#alert" + NRid).fadeIn();
                $("#alert" + NRid).html(data);
                $("#alert" + NRid).fadeOut(3000);
            });
            $('#NR' + NRid + '_sys').val(NRvalue);
        } else {
            showError('1', '0', 'Only numbers and . - space are allowed');
        }
    }
}

function editReport(testId, testName) {
    $("#data").html(loadimg);
	var url=tests_array[testName];
    $.get(url, {
        testId: testId
    }, function (data) {
        $("#data").html(data);
    });
}