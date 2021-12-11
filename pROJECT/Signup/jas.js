
function my_Validate(){
    //return false;
    var name = document.forms["signup_form"]["username"].value;
    var phone=document.forms["signup_form"]["phone"].value;
    var pass=document.forms["signup_form"]["pass"].value;
    var cpass=document.forms["signup_form"]["cpass"].value;
    var DOB = document.forms["signup_form"]["DOB"].value;
    var age = document.forms["signup_form"]["age"].value;
    return check_phone(phone)&&Calculate_age(DOB,age)&&check_password(pass,cpass);
}
//document.getElementById("a").value;
function check_password(pass,cpass)
{
    if(pass == cpass)
        return true;
    else
        return false;
}
function check_phone(phone)
{
      if(phone.length == 10)
      {
            for(var i=0;i<10;i++)
            {
                if(phone[i] >= '0' && phone[i] <= '9')
                    continue;
                else
                    return false;
            }
            return true;
      }
      else
        return false;
}

function Calculate_age(dateString,agein) 
{
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    if (age<18){
        alert('User must be 18 or Older');
        console.log('l');
    }
    return (age==agein && age>=18);
}

