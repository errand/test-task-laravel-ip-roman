
const object_form = document.getElementById('object_form');
const method_select = document.getElementById('form_method');
const status = document.getElementById('status');

method_select.addEventListener('change', ev => object_form.method = ev.target.value);

object_form.addEventListener('submit', ev => {
    ev.preventDefault();
    submitObjectForm();
})

async function submitObjectForm() {

    const token = document.getElementById('user_token').value;
    document.getElementById('user_token').value = '';
    document.getElementById('data').value = '';

    const body = object_form.method === 'post' ?  JSON.stringify({
        'data': document.getElementById('data').value
    }) : null


    const url = object_form.method === 'post' ? '/objects/create/store' : '/objects/create/store?data=' + body;

    const response = await fetch(url, {
        method: object_form.method,
        headers: new Headers({
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Header-Token': token,
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        }),
        body
    });

    if(!response.ok) {
        status.innerText = 'Invalid Token provided';
    } else {
        const data = await response.json();
        status.innerHTML = `
            <p>Object added with ID: ${data.object_id}</p>
            <p>Memory used: ${data.memory_used } MB</p>
            <p>Execution time: ${data.time_used} s</p>
        `;
    }
}
