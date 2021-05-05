function getData()
{
    var email = document.getElementById("email").value;
    localStorage.setItem("InputValue", email);   
}

document.getElementById("UserEmail").innerHTML=localStorage.getItem("InputValue");