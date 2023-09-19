console.log('testpage js is connected ');

const menuopen = document.querySelector(".menuopen");

menuopen.addEventListener('click',function(){

    const sidemenu = document.querySelector(".sidemenu");
    sidemenu.classList.toggle('active');

});

const list = document.querySelectorAll(".list");

list.forEach(opt => {
    opt.addEventListener('click',function(){
        list.forEach(list => {
            list.classList.remove('active');
        });
        opt.classList.add('active');
    })
});

// document.addEventListener("DOMContentLoaded", function () {
//     const usernameBtn = document.querySelector(".username-btn");
//     const dropdownMenu = usernameBtn.querySelector(".dropdown-menu");

//     usernameBtn.addEventListener("click", function (e) {
//         e.stopPropagation(); // Prevent the document click event from immediately closing the dropdown
//         dropdownMenu.classList.toggle("show-dropdown");
//     });

//     // Close the dropdown when clicking anywhere outside of it
//     document.addEventListener("click", function (e) {
//         if (!usernameBtn.contains(e.target)) {
//             dropdownMenu.classList.remove("show-dropdown");
//         }
//     });
// });
