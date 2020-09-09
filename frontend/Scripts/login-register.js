async function getUser(userId, password) {
    const URL = 'http://localhost/xelp-project-calc/backend/login.php';
    const BODY = {
        userId,
        password
    };

    const request = new Request(URL, {
        method: 'POST',
        mode: 'no-cors',
        body: JSON.stringify(BODY),
        headers: new Headers({
            'Content-Type': 'application/;charset=utf-8'
        })
    });


    return fetch(request)
        .then(res => res.json())
        .then(data => data)
        .catch(error => console.log(error));

}


async function createUser(userId,email,name, password) {
    const URL = 'http://localhost/xelp-project-calc/backend/register.php';
    const BODY = {
        userId,
        email,
        name,
        password
    };

    const request = new Request(URL, {
        method: 'POST',
        mode: 'no-cors',
        body: JSON.stringify(BODY),
        headers: new Headers({
            'Content-Type': 'application/;charset=utf-8'
        })
    });


    return fetch(request)
        .then(res => res.json())
        .then(data => data)
        .catch(error => console.log(error));

}



async function checkLogin() {
    let userId = document.getElementById('userId').value;
    let password = document.getElementById('password').value;
    let status = await getUser(userId, password);
    if (status.success) {
        alert(`Welcome ${status.name} `);
        window.location.href = "http://localhost/xelp-project-calc/frontend/calculator.html"
    }
    let div = document.getElementById('loginStatus');
    div.innerText = 'Your userId or password is incorrect';
    
}

function registerUser(){
    let userId = document.getElementById('userId').value;
    let password = document.getElementById('password').value;
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    createUser(userId, email, name, password); 
    window.location.href = "http://localhost/xelp-project-calc/frontend/index.html"
}

