const btn1 = document.getElementById('btn1');
const btn2 = document.getElementById('btn2');
const signInForm = document.getElementById('signin');
const signUpForm = document.getElementById('signup');

btn1.addEventListener('click', function() {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
});

btn2.addEventListener('click', function() {
    signUpForm.style.display = "block";
    signInForm.style.display = "none";
});
