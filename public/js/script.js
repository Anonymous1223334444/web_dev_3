let btn_connect = document.getElementById('btn_connect');
let btn_create = document.getElementById('btn_create');
let cards = document.querySelectorAll(".card");

btn_connect.addEventListener('click', function() {
    window.location.href = "http://localhost/web_dev_3/pages/Login.php"; 
});

btn_create.addEventListener('click', function() {
    window.location.href = "http://localhost/web_dev_3/pages/Signup.php"; 
});


cards.forEach(card => {
    card.addEventListener("click", function(e) {
        window.location.href = "http://localhost/web_dev_3/pages/course_detail.php";
    })
});

// cards.forEach(card => {
//     card.addEventListener("click", function(e) {
//         window.location.href = card.dataset.lecture;
//     })
// });


