        /*
         * Author: Ronash Dhakal
         */
        





function error(msg){
     $.notify(msg, "error");
}
function success(msg){
     $.notify(msg, "success");
}
function info(msg){
     $.notify(msg, "info");
}
function warning(msg){
     $.notify(msg, "warning");
}





        
        $('[data-toggle="tooltip"]').tooltip() 
$('#Home').fadeIn("slow");
function showHome(){
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    $('.tabcontent').hide();
   $('#Home').fadeIn("slow"); 
}





$('#brand').css('cursor', 'pointer');
$('.tablinks').css('cursor', 'pointer');
$('.links').css('cursor', 'pointer');
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
//tab content
function openCategory(evt, catName) {
 
    var i, tabcontent, tablinks;

   
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

   
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

   
    document.getElementById(catName).style.display = "block";
    evt.currentTarget.className += " active";
}


function showLogin() {
      
      document.getElementById("register_form").style.width = "0%";
    document.getElementById("login_form").style.width = "100%";
 
}

function showProfile(close) {
    switch (close){
        case '1':
                document.getElementById("profile").style.width = "0%";

            break;
            case '0':
                document.getElementById("profile").style.width = "0%";

            break;
        default :
             document.getElementById("profile").style.width = "100%";
            break;
    }  
    
 
}
function close_overlay() {
    document.getElementById("login_form").style.width = "0%";
     document.getElementById("register_form").style.width = "0%";
     document.getElementById("profile").style.width = "0%";
   
}

