document.getElementById('exampleRepeatPassword').addEventListener('onpress', function () {
    const pass1 = document.getElementById('exampleInputPassword').value;
    const pass2 = document.getElementById('exampleRepeatPassword').value;

    if (pass1 !== pass2) {
        document.getElementById('info').innerHTML = 'Password tidak sesuai';
        document.getElementById('info').style.display = 'block';
    } else {
        document.getElementById('info').style.display = 'none';
    }
});


// document.getElementById('exampleRepeatPassword').addEventListener(onchan)

