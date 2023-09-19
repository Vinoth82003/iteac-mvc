console.log('script.js connected');

const signin_btn = document.querySelectorAll(".signin-btn");
const signup_btn = document.querySelectorAll(".signup-btn");

let siginBox = document.querySelector('.signin-form-box');
let signupBox = document.querySelector('.signup-form-box');

signup_btn.forEach(signup => {
    signup.addEventListener('click', function(){
        if (siginBox.classList.contains("active")) {
            siginBox.classList.remove("active");
            siginBox.classList.add("done");
        }

        signupBox.classList.add("active");
        signupBox.classList.remove("done");
    })
});

signin_btn.forEach(signin => {
    signin.addEventListener('click', function(){
        if (signupBox.classList.contains('active')) {
            signupBox.classList.remove("active");
            signupBox.classList.add("done");
        }

        siginBox.classList.add("active");
        siginBox.classList.remove("done");
    })
});

const menu = document.querySelectorAll('.menu-item');

menu.forEach(link => {
    console.log('list');
    link.addEventListener("click",function(){
        menu.forEach(btn => {
            btn.classList.remove('active');
        });
        link.classList.add("active");
    })
});

let errorMsg = document.querySelector(".error");

const closeBtns = document.querySelectorAll(".closeBtn");

closeBtns.forEach(closeBtn => {
    closeBtn.addEventListener("click",function(){
        closeBtn.parentElement.classList.add("done")
        setTimeout(() => {
            errorMsg.remove();
        }, 500);
    });
});