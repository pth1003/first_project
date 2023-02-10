const cmtFail = document.querySelector('.cmt-fail')
const cmtSuccess = document.querySelector('.cmt-success')
const formCmt = document.querySelector('.form-comment')
const  closeCmt = document.querySelector('.close-cmt')

function showAlert() {
    alert('Bạn cần đăng nhập để bình luận')
}
function  showCmt() {
    formCmt.classList.add('show')
}
cmtSuccess.addEventListener('click', showCmt)

function  hideCmt() {
    formCmt.classList.remove('show')
}
closeCmt.addEventListener('click', hideCmt)