

function showLevel(){

    var level = $('#level :selected').val();
    

if(level == "1") {
   
        document.getElementById("zone").style.display = "block";
       
        
        document.getElementById("comm").style.display = "none";
        document.getElementById("asst_comm").style.display = "none";
        document.getElementById("range").style.display = "none";
}
else if(level == "2") {
   
    document.getElementById("zone").style.display = "block";
    document.getElementById("comm").style.display = "block";
   // zcdr_code = $('#comm :selected').val();
    document.getElementById("asst_comm").style.display = "none";
    document.getElementById("range").style.display = "none";
}

else if(level == "3") {
   
    document.getElementById("zone").style.display = "block";
    document.getElementById("comm").style.display = "block";
    document.getElementById("asst_comm").style.display = "block";
  //  zcdr_code = $('#asst_comm :selected').val();
    document.getElementById("range").style.display = "none";
}
else if(level == "4") {
   
    document.getElementById("zone").style.display = "block";
    document.getElementById("comm").style.display = "block";
    document.getElementById("asst_comm").style.display = "block";
    document.getElementById("range").style.display = "block";
  //  zcdr_code = $('#range :selected').val();
}
else{
    document.getElementById("zone").style.display = "none";
    document.getElementById("comm").style.display = "none";
    document.getElementById("asst_comm").style.display = "none";
    document.getElementById("range").style.display = "none";
}


// sessionStorage.setItem("ZCDR_CODE", zcdr_code);
// let sessionZCDR = sessionStorage.getItem("ZCDR_CODE");
// document.getElementById("demo").innerHTML = sessionZCDR;







}

