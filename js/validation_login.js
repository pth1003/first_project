const userName = document.querySelector('.username')
const passWord = document.querySelector('.password')
const errorUsername = document.querySelector('.container-items-username')
const errorPassword = document.querySelector('.container-items-password')

function Validation() {
    // validation userName
    userName.onblur = function () {
        if (userName.value.length == '') {
            errorUsername.style.border = '2px solid red'
            errorUsername.querySelector('span').innerText = 'Vui lòng nhập username'
        } else {
            errorUsername.style.border = '1px solid black'

        }
    }

    userName.oninput = function () {
        if (userName.value.length != '') {
            errorUsername.style.border = '1px solid black'
            errorUsername.querySelector('span').innerText = ''
        }
    }

    // validation passWord
    passWord.onblur = function () {
        if (passWord.value.length == '') {
            errorPassword.style.border = '2px solid red'
            errorPassword.querySelector('span').innerText = 'Vui lòng nhập password'
        } else {
            errorPassword.style.border = '1px solid black'
        }
    }

    passWord.oninput = function () {
        if (passWord.value.length < 6) {
            errorPassword.querySelector('span').innerText = 'Password phải có ít nhất 6 kí tự'
            errorPassword.style.border = '2px solid red'
        }
        if (passWord.value.length >= 6) {
            errorPassword.style.border = '1px solid black'
            errorPassword.querySelector('span').innerText = ''
        }
    }
}

Validation()