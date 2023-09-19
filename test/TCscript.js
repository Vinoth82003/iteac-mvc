console.log('T&C script.js connected..!');

var currentIndex = 0;
const nxtbtn = document.querySelector('.tcnext');

const modles = document.querySelectorAll('.module');
const lines = document.querySelectorAll('.line');
const dots = document.querySelectorAll('.dot');

function modleAndIndex(){
    console.log('called');
    modles.forEach(mod => {
        var index = mod.getAttribute('index');
        // console.log('c-index '+currentIndex);
        // console.log('index '+ index);
        if (index.toString() === currentIndex.toString()) {
            mod.style.display = 'flex';
        }else{
            mod.style.display = 'none';
        }
    });
    lines.forEach(mod => {
        var index = mod.getAttribute('index');
        if (index.toString() === currentIndex.toString()) {
            mod.classList.add('active')
        }
    });

    dots.forEach(mod => {
        var index = mod.getAttribute('index');
        if (index.toString() === currentIndex.toString()) {
            mod.classList.add('active')
        }
    });
}


function setTC() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'tc.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    
    var data = JSON.stringify({ done: 'done' });

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log('Done message sent to tc.php');
                var response = JSON.parse(xhr.responseText);
                console.log('Response from tc.php:', response);
                if (response.status = 'success') {
                    location.reload();
                    // console.log(response);
                }
            } else {
                console.error('Error sending done message to tc.php. Status:', xhr.status);
            }
        }
    };

    xhr.send(data);
}




nxtbtn.addEventListener('click',function(){
    console.log('clicked');
    currentIndex = currentIndex + 1;
    if (currentIndex < 3) {
        modleAndIndex();
    }else if (currentIndex === 3) {
        setTC();
    }
    
});
