const form = document.querySelector('.form-login')
const fullName = document.querySelector('.fullname')
const userName = document.querySelector('.username')
const passWord = document.querySelector('.password')
const rePassword = document.querySelector('.repassword')
const email = document.querySelector('.email')

fullName.addEventListener('blur', myFunction)

function myFunction() {
    alert(123)
}
form.addEventListener('submit', (e) =>   {
        e.preventDefault();
        Validation()
})
function Validation() {}

//
// fullName.addEventListener('blur', checkFullname())

// fullName.onblur = function () {
//     // if(fullName.value.length == '' || fullName.value.lenth == null) {
//         alert('333')g
//     // }
// }





