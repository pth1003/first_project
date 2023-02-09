const form = document.querySelector('.form-login')
const fullName = document.querySelector('.fullname')
const userName = document.querySelector('.username')
const passWord = document.querySelector('.password')
const rePassword = document.querySelector('.repassword')
const email = document.querySelector('.email')
const avt = document.querySelector('.avt')
const errorFullname = document.querySelector('.container-items-fullname')
const errorUsername = document.querySelector('.container-items-username')
const errorPassword = document.querySelector('.container-items-password')
const errorRepasswod = document.querySelector('.container-items-repassword')
const errorEmail = document.querySelector('.container-items-email')
const errorAvt = document.querySelector('.container-items-avt')


// form.addEventListener('submit', (e) => {
//     e.preventDefault()
// })
function Validation() {
    // validation fullName
    fullName.onblur = function () {
        if(fullName.value.length == '') {
            errorFullname.style.border = '2px solid red'
            errorFullname.querySelector('span').innerText = 'Vui lòng nhập tên đầy đủ'
        }
    }

    fullName.oninput = function () {
        if(fullName.value.length != '') {
            errorFullname.style.border = '1px solid black'
            errorFullname.querySelector('span').innerText = ''
        }
    }

    // validation userName
    userName.onblur = function () {
        if(userName.value.length == '') {
            errorUsername.style.border = '2px solid red'
            errorUsername.querySelector('span').innerText = 'Vui lòng nhập username'
        }else{
            errorUsername.style.border = '1px solid black'

        }
    }

    userName.oninput = function () {
        if(userName.value.length != '') {
            errorUsername.style.border = '1px solid black'
            errorUsername.querySelector('span').innerText = ''
        }
    }

    // validation passWord
    passWord.onblur = function () {
        if(passWord.value.length == '') {
            errorPassword.style.border = '2px solid red'
            errorPassword.querySelector('span').innerText = 'Vui lòng nhập password'
        }else{
            errorPassword.style.border = '1px solid black'
        }
    }

    passWord.oninput = function () {
        if(passWord.value.length < 6){
            errorPassword.querySelector('span').innerText = 'Password phải có ít nhất 6 kí tự'
            errorPassword.style.border = '2px solid red'
        }
        if(passWord.value.length >= 6) {
            errorPassword.style.border = '1px solid black'
            errorPassword.querySelector('span').innerText = ''
        }
    }

    //validation repassWord
    rePassword.onblur = function () {
        if(rePassword.value.length == '') {
            errorRepasswod.style.border = '2px solid red'
            errorRepasswod.querySelector('span').innerText = 'Vui xác nhận passWord'
        }
    }

    rePassword.oninput = function () {
        if(rePassword.value != passWord.value){
            errorRepasswod.querySelector('span').innerText = ''
            errorRepasswod.querySelector('span').innerText = 'Password không giống nhau'
            errorRepasswod.style.border = '2px solid red'
        }else if((rePassword.value.length >= 6) && (rePassword.value == passWord.value)) {
            errorRepasswod.style.border = '1px solid black'
            errorRepasswod.querySelector('span').innerText = ''
        }
    }



    //validation email
    email.onblur = function () {
        if(email.value.length == '') {
            errorEmail.style.border = '2px solid red'
            errorEmail.querySelector('span').innerText = 'Vui lòng nhập email'
        }
    }

    email.oninput = function () {
        if(email.value != '') {
            errorEmail.style.border = '1px solid black'
            errorEmail.querySelector('span').innerText = ''
        }
    }

    //validation avatar
    avt.onblur = function () {
        if(avt.files.length == 0){
            errorAvt.style.border = '2px solid red'
            errorAvt.querySelector('span').innerText = 'Vui lòng nhập ảnh đại diện'
        }
    }

    avt.oninput = function () {
        if(avt.files.length != 0){
            errorAvt.style.border = '1px solid black'
            errorAvt.querySelector('span').innerText = ''

        }
    }

}

Validation()






