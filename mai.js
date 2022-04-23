
$(window).scroll(function() {
  if ($(this).scrollTop() > 1){
    $('.navbar').addClass("scrolle");
  }
  else {
    $('.navbar').removeClass("scrolle");
  }
});

function darkmode() {
  var elem = document.getElementById("bg");
   elem.classList.toggle("darkbg");
  // if(this.checked){
  //   $('.bg').addClass("darkbg");
  // }
  // else{
  //   $('.bg').removeClass("darkbg");
  // }
}

function vi3(){
  var output = false;
  var x = document.f1.newp;
  if(x.type === "password"){
    x.type = "text";
  }
  else{
    x.type = "password";
  }
  return output;
}

function vi5(){
  var output = false;
  var x = document.reg.passn;
  if(x.type === "password"){
    x.type = "text";
  }
  else{
    x.type = "password";
  }
  return output;
}


function vi(){
  var output = false;
  var x = document.login.pass;
  if(x.type === "password"){
    x.type = "text";
  }
  else{
    x.type = "password";
  }
  return output;
}

function vi2(){
var output = false;
var y = document.update.oldp;
if(y.type === "password"){
    y.type = "text";
}
else{
  y.type = "password";
}

return output;
}

function jvalid(){
  var uname, pass, output = true;
  uname = document.login.user;
  pass = document.login.pass;
  if(!pass.value && !uname.value) {
    pass.focus();
    document.getElementById('warn').innerHTML = "Please enter a Username";
    document.getElementById('warn2').innerHTML = "Please enter Password";
    output = false;
  }
  else if(!pass.value){
    pass.focus();
    document.getElementById('warn2').innerHTML = "Please enter Password";
    output = false;
  }
  else if(pass.value.length < 8){
    pass.focus();
    document.getElementById('warn2').innerHTML = "Password should be atleast 8 characters";
    output = false;
  }
  else if(!uname.value){
    uname.focus();
    document.getElementById('warn').innerHTML = "Please enter a Username";
    output = false;
  }
  return output;
}

function jvalida(){
  var uname, pass, email, output = true;
  uname = document.reg.user;
  pass = document.reg.passn;
  email = document.reg.mail;
  ans = document.reg.sa;

  if(!pass.value && !uname.value && !email.value && !ans.value) {
    pass.focus();
    document.getElementById('warn').innerHTML = "Please enter a Username";
    document.getElementById('warn2').innerHTML = "Please enter Password";
    document.getElementById('warn3').innerHTML = "Please enter email";
    document.getElementById('warn4').innerHTML = "Please enter a security answer";
    output = false;
  }
    else if(!uname.value){
    uname.focus();
    document.getElementById('warn').innerHTML = "Please enter a Username";
    output = false;
  }
  else if(!pass.value){
    pass.focus();
    document.getElementById('warn2').innerHTML = "Please enter Passwo0rd";
    output = false;
  }
  else if(pass.value.length < 8){
    pass.focus();
    document.getElementById('warn2').innerHTML = "Password should be atleast 8 characters";
    output = false;
  }
  else if(!email.value){
    email.focus();
    document.getElementById('warn3').innerHTML = "Please enter Email";
    output = false;
  }
  else if(!ans.value){
    ans.focus();
    document.getElementById('warn4').innerHTML = "Please enter your security answer";
    output = false;
  }
  return output;
}

function check(){
  var ques, email, output = true;
  ques = document.reset.sq;
  email = document.reset.t3;
  ans = document.reset.t4;
  if(ques.value == "default" && !email.value && !ans.value) {
    pass.focus();
    document.getElementById('warn').innerHTML = "Please select a security Question";
    document.getElementById('warn3').innerHTML = "Please enter email";
    document.getElementById('warn4').innerHTML = "Please enter a security answer";
    output = false;
  }
  else if(ques.value=="default"){
    ques.focus();
    document.getElementById('warn').innerHTML = "Please select a security Question";
    output = false;
  }
  else if(!email.value){
    email.focus();
    document.getElementById('warn3').innerHTML = "Please enter Email";
    output = false;
  }
  else if(!ans.value){
    ans.focus();
    document.getElementById('warn4').innerHTML = "Please enter your security answer";
    output = false;
  }
  return output;
}



function valid3(){
  var oldpass, newpass, conpass, output = true;
  oldpass = document.update.oldp;
  newpass = document.update.newp;
  conpass = document.update.conp;

  if(newpass.value !== conpass.value && !oldpass.value){
    oldpass.focus();
    document.getElementById('warn').innerHTML = "Please enter old Password";
    document.getElementById('warn1').innerHTML = "New Password and Confirm passwords do not Match";
    output = false;
  }
  else if(newpass.value !== conpass.value) {
    newpass.focus();
    document.getElementById('warn1').innerHTML = "New Password and Confirm passwords do not Match";
    output = false;
  }
  return output;
}
