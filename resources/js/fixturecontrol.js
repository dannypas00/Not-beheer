const T1 = document.getElementById('T1');
const T2 = document.getElementById('T2');
const T3 = document.getElementById('T3');



document.addEventListener('keypress', logKey);

function logKey(e) {
    console.log(e.code);
    if(e.which == 13)
    {
        console.log("taab");
    }
}
