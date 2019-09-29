function lettersonly(input){
 var regex= /[^a-z]/gi;
 input.value=input.value.replace(regex,"");
}
function emailcheck(input){
  var regex=/[^a-z0-9@.]/gi;
  input.value=input.value.replace(regex,"");
}
function numbersonly(input){
 var regex= /[^0-9]/gi;
 input.value=input.value.replace(regex,"");
}


function passcheck(input){
   var regex= /[^a-z0-9!@#$%&]/gi;
  var str=input.value;
  var passinfo=document.getElementById('passinfo');
  if(str.search(regex)!=-1){
      passinfo.innerHTML="**Password should contain only alphabets, numbers and symbol i.e. '!,@,#,$,%,&'";
      input.value=input.value.replace(regex,"");
  }
  else if(str.search(/[0-9]/)==-1){
      passinfo.innerHTML="**one number must be present";
  }
  else if(str.search(/[a-z]/)==-1){
      passinfo.innerHTML="**one small alphabet must be present";
  }
  else if(str.search(/[A-Z]/)==-1){
      passinfo.innerHTML="**one capital alphabet must be present";
  }
  else if(str.search(/[!\@\#\$\%\&]/)==-1){
      passinfo.innerHTML="**one special symbol i.e. '!,@,#,$,%,&' must be present";
  }
  else if(str.length <8){
    passinfo.innerHTML="**password must be 8 characters long";
  }
  else{
    var passinfo=document.getElementById('passinfo');
    passinfo.innerHTML="";
  }
}

function cpasscheck(input){
   var regex= /[^a-z0-9!@#$%&]/gi;
  var str=input.value;
  var passinfo=document.getElementById('cpassinfo');
  if(str.search(regex)!=-1){
      passinfo.innerHTML="**Password should contain only alphabets, numbers and symbol i.e. '!,@,#,$,%,&'";
      input.value=input.value.replace(regex,"");
  }
  else if(str.search(/[0-9]/)==-1){
      passinfo.innerHTML="**one number must be present";
  }
  else if(str.search(/[a-z]/)==-1){
      passinfo.innerHTML="**one small alphabet must be present";
  }
  else if(str.search(/[A-Z]/)==-1){
      passinfo.innerHTML="**one capital alphabet must be present";
  }
  else if(str.search(/[!\@\#\$\%\&]/)==-1){
      passinfo.innerHTML="**one special symbol i.e. '!,@,#,$,%,&' must be present";
  }
  else if(str.length <8){
    passinfo.innerHTML="**password must be 8 characters long";
  }
  else{
    passinfo.innerHTML="";
  }
}

function check(input){
  var s=document.getElementById('student');
  var p=document.getElementById('parent');
  var t=document.getElementById('teacher');
  var a=document.getElementById('admin');
  if(input.value=="student"){
    s.style.display="block";
    p.style.display="none";
    t.style.display="none";
  }
  else if(input.value=="parent"){
    s.style.display="none";
    p.style.display="block";
    t.style.display="none";
  }
  else if(input.value=="teacher"){
    s.style.display="none";
    p.style.display="none";
    t.style.display="block";
    a.style.display="";
  }
  else if(input.value=="admin"){
    s.style.display="none";
    p.style.display="none";
    t.style.display="block";
    a.style.display="none";
  }
  else{
    s.style.display="none";
    p.style.display="none";
    t.style.display="none";
  }
}

function validation(){
  var pass=document.getElementById('pass');
  var cpass=document.getElementById('cpass');
  var msg=document.getElementById('cpassinfo');
  var valid=document.getElementBYID('passinfo');
  if(pass.value!=cpass.value || valid.value!=""){
      cpassinfo.innerHTML="**passwords did not match";
    return false;
  }
  else{
    return true;
  }
}
