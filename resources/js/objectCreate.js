
const object_form = document.getElementById('object_form');
const method_select = document.getElementById('form_method');

const status_message = document.getElementById('status');
const form_action = object_form.action;

method_select.addEventListener('change', ev => object_form.method = ev.target.value);

object_form.addEventListener('submit', ev => {
    ev.preventDefault();
    submitObjectForm();
})

async function submitObjectForm() {
    const object_id_field = document.getElementById('object_id');
    const object_id = object_id_field ? object_id_field.value : null;

    const token = document.getElementById('user_token').value;
    const textarea = document.getElementById('data').value;
    document.getElementById('user_token').value = '';
    document.getElementById('data').value = '';

    const body = object_form.method === 'post' ?  JSON.stringify({
        'data': textarea,
        'id': object_id
    }) : null


    const url = object_form.method === 'post' ? form_action : form_action + '?data=' + body;

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
        status_message.innerText = 'Invalid Token provided';
    }
    else {
        const data = await response.json();
        if (data.code === 401 || data.action === 'update') {
            status_message.innerHTML = `<p>${data.message}</p>`;
        } else {
            status_message.innerHTML = `
            <p>${data.message}</p>
            <p>Object added with ID: ${data.object_id}</p>
            <p>Memory used: ${data.memory_used } MB</p>
            <p>Execution time: ${data.time_used} s</p>
        `;
        }
    }
}
