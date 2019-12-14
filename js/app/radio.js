function checkselectUser(id) {

    console.log(id);
}

function checkUser(user) {

    if (user == 'user_new') {
        document.getElementById('phone').removeAttribute('readonly');
        document.getElementById('main_user').removeAttribute('readonly');
        document.getElementById('name').removeAttribute('readonly');
        document.getElementById('contrack').removeAttribute('readonly');
        document.getElementById('tel_contact').removeAttribute('readonly');
    } else {
        document.getElementById('phone').readOnly = "true";
        document.getElementById('main_user').readOnly = "true";
        document.getElementById('name').readOnly = "true";
        document.getElementById('contrack').readOnly = "true";
        document.getElementById('tel_contact').readOnly = "true";
    }
    console.log(user);


}