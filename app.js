function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function ClearText() {
    $("textarea").val("");
    document.getElementById("textarea-counter").innerHTML = "240 Characters Remaining";
}

//this function can remove a array element.
Array.remove = function(array, from, to) {
    var rest = array.slice((to || from) + 1 || array.length);
    array.length = from < 0 ? array.length + from : from;
    return array.push.apply(array, rest);
};

//this variable represents the total number of popups can be displayed according to the viewport width
var total_popups = 0;

//arrays of popups ids
var popups = [];

//this is used to close a popup
function close_popup(id) {
    for (var iii = 0; iii < popups.length; iii++) {
        if (id == popups[iii]) {
            Array.remove(popups, iii);

            document.getElementById(id).style.display = "none";

            calculate_popups();

            return;
        }
    }
}

//displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
function display_popups() {
    var right = 220;

    var iii = 0;
    for (iii; iii < total_popups; iii++) {
        if (popups[iii] != undefined) {
            var element = document.getElementById(popups[iii]);
            element.style.right = right + "px";
            right = right + 320;
            element.style.display = "block";
        }
    }

    for (var jjj = iii; jjj < popups.length; jjj++) {
        var element = document.getElementById(popups[jjj]);
        element.style.display = "none";
    }
}

//creates markup for a new popup. Adds the id to popups array.
function register_popup(id, name) {

    for (var iii = 0; iii < popups.length; iii++) {
        //already registered. Bring it to front.
        if (id == popups[iii]) {
            Array.remove(popups, iii);

            popups.unshift(id);

            calculate_popups();


            return;
        }
    }

    var element = '<div class="popup-box chat-popup" id="' + id + '">';
    element = element + '<div class="popup-head">';
    element = element + '<div class="popup-head-left">' + name + '</div>';
    element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\'' + id + '\');">&#10005;</a></div>';
    element = element + '<div style="clear: both"></div></div><div class="popup-messages"></div></div>';

    document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;

    popups.unshift(id);

    calculate_popups();

}

//calculate the total number of popups suitable and then populate the toatal_popups variable.
function calculate_popups() {
    var width = window.innerWidth;
    if (width < 540) {
        total_popups = 0;
    } else {
        width = width - 200;
        //320 is width of a single popup box
        total_popups = parseInt(width / 320);
    }

    display_popups();

}

//recalculate when window is loaded and also when window is resized.
window.addEventListener("resize", calculate_popups);
window.addEventListener("load", calculate_popups);



$('#form-send-message').submit(function() {
    var message = $('#message').val();
    var sender = $('#sender').val();
    var reciever = $('#reciever').val();

    $.ajax({
        url: '../scripts/send-message.php',
        data: {
            sender: sender,
            message: message,
            reciever: reciever
        },
        success: function(data) {

        }
    });
    return false;
});

$('#new-post-form').submit(function() {
    var textarea = $('#textarea').val();

    $.ajax({
        url: 'scripts/new-post.php',
        data: {
            textarea: textarea
        },
        success: function(data) {

        }
    });
    $.ajax({
        url: 'scripts/process-posts.php',
        success: function(data) {
            $('#posts').html(data);
        }
    });
    $("#textarea").val("");
    return false;
});

$(".like-btn").on("click", function(){
    userid = $(this).attr("user-id");
    postid = $(this).attr("post-id");
    likePost(postid, userid);
});

function likePost(postid, userid) {
    var data = 'userid='+userid+'&postid='+postid;
    $.ajax({
        type: 'POST',
        url: 'scripts/like.php',
        data: data,
        success: function(likes) {
            
        }
    });
    $.ajax({
        url: 'scripts/process-likes.php',
        success: function(data) {
            $('#likes').html(data);
        }
    });
};

function PostCheck() {
    if($("#textarea").val("")) {
        Materialize.toast('Please write something to post', 4000);
    } else {
        Materialize.toast('Posted!', 4000); 
    }
}