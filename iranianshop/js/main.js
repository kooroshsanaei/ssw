"user strict;"



function check_empty() {
    var username = "";
    username = document.getElementById('username').value;

    if(username=="") 
        alert('نام کاربری الزامی است');
    else {
        var go = confirm('از صحت اطلاعات وارد شده اطمینان دارید ؟');
        if(go == true) {
            document.register.submit();
        }
    }
}