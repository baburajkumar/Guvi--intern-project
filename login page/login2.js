

function Validationform(){
    let username = document.getElementById("username");
    let password = document.getElementById("password");
    if(username.value==""){
        alert("Please Enter Your Name");
        // document.getElementById("userError").innerHTML = "Please Enter Your Name";
        // return false;
    }else if(username.value.length <3){
        alert("Username required min 3 char");
        // document.getElementById("userError").innerHTML = "Username required min 3 char";
        // return false;
    }else{
        // document.getElementById("username").innerHTML = "";
    }if(password.value ==""){
        alert("Please enter Your Name");
        // document.getElementById("passError").innerHTML = "Please enter Your Name";
        // return false;
    }else if(password.value.length < 5){
        alert("Please Enter min 5 word");
        // document.getElementById("passError").innerHTML = "Please Enter min 5 word";
        // return false;
    }
}
<script type="text/javascript">
    $(document).ready(function() { 
        $('#box').ajaxForm(function() { 
            alert("Successfully Registered!"); 
        })
    });
</script>

