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

function check_input() {
    var r = confirm("از صحت اطلاعات وارد شده اطمینان داری ؟!‌");
    if (r == true) {
        var validation = true;
        var count = document.getElementById('pro_qty').value;
        var mobile = document.getElementById('mobile').value;
        var address = document.getElementById('address').value;
        
        if(count == 0 || count == "") 
            validation = false;

        if(mobile.length<11)
            validation = false;
        if(address.length<15) 
            validation = false;
        if(validation) 
            document.order.submit();
        else
            alert('برخی از ورودی های فرم سفارش محصول به درستی پر نشده اند ');

    }
    
}
