console.log('profile options is connected');

const profileBox = document.querySelector(".profileBox");
const profilebtn = document.querySelector(".profilebtn");
const closeBtn = document.querySelector('.closeBtn')

profilebtn.addEventListener('click',function(){
    console.log('clicked');
    profileBox.style.top = '130px';
    profileBox.style.opacity = '1';
});

closeBtn.addEventListener('click',function(){
    profileBox.style.top = '-700px';
    profileBox.style.opacity = '0';
})