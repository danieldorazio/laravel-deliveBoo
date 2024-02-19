import './bootstrap';

import "~resources/scss/app.scss";
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

// Delete modal
const buttons =document.querySelectorAll('.delete-btn');

buttons.forEach(button => { 
    button.addEventListener('click', (event) =>{
        event.preventDefault()

        const deleteModal = new bootstrap.Modal('#delete-modal')

        const title = button.getAttribute('data-title')
        document.getElementById('delete-title').innerHTML = title

        document.getElementById('confirm-delete-btn').addEventListener('click', () =>{
            button.parentElement.submit()
        })

        deleteModal.show()
    })
})
