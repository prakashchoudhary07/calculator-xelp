let operationString = '';

function appendOps(ops) {
    
    console.log(ops);
    let screen = document.getElementById('screen');
    screen.value += ops;
    operationString  += ops;
}

function clearScreen() {
    document.getElementById('screen').value = '';
    operationString = '';
}

function result() {
    let screenContent = document.getElementById('screen');
    try {
        let res = eval(screenContent.value);
        screenContent.value = (res % 1 === 0) ? res : res.toFixed(2);
    } catch (error) {
        screenContent.value = 'error';
    }
    addOperaionToDb(operationString, screenContent.value);
    operationString = screenContent.value;
}


function addOperaionToDb(operation, result) {
    const URL = 'http://localhost/xelp-project-calc/backend/calOperations.php';
    const BODY = {
        operation,
        result
    };
    console.log(BODY);
    
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
        .then(data => console.log(data))
        .catch(error => console.log(error));

}