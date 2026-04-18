// location toggle
try {
    const toggle = document.getElementById('location_toggle');
    const toggle_output = document.getElementById('location_form');
    const location_edit_form = document.getElementById('edit_form_location');
    const form_btn = document.getElementById('location_form_btn');

    toggle.addEventListener('click', () => {
        toggle_output.classList.remove('hidden');
        location_edit_form.classList.add('hidden');
    })

    
    form_btn.addEventListener('click', () => {
        toggle_output.classList.add('hidden');
    })

} catch (err) {
    console.log(err);
}

// activities toggle
try {
    const activity_toggle = document.getElementById('activity_toggle');
    const activity_form = document.getElementById('form_activity');
    const activity_edit_form = document.getElementById('activity_edit_form');

    activity_toggle.addEventListener('click', () => {
        activity_form.classList.remove('hidden');
        activity_edit_form.classList.add('hidden');
    })
} catch (err) {
    console.log(err);
}

// Dropdown
try {
    const destination_toggle = document.querySelectorAll('.destination_dropdown_toggle');

    destination_toggle.forEach(element => {
        element.addEventListener('click',function () {
            const parent = this.parentElement;
            const div = parent.querySelector('.destination_dropdown');
            if (div.classList.contains('hidden')) {
                div.classList.remove('hidden'); 
            } else {
                div.classList.add('hidden'); 
            }
        })
    });
} catch (err) {
    console.log(err);
}

// Edit destination
try {
    const edit_destination_toggle = document.querySelectorAll('.edit_destination_toggle');
    const edit_form_destination = document.getElementById('edit_form_destination');
    const add_form_destination = document.getElementById('add_form_destination');

    const id = document.querySelector('[name="edit_id"]');
    const user_id = document.querySelector('[name="edit_user_id"]');
    const judul = document.querySelector('[name="edit_judul"]');
    const tanggal = document.querySelector('[name="edit_tanggal"]');
    const budget = document.querySelector('[name="edit_budget"]');
    const lama_liburan = document.querySelector('[name="edit_lama_liburan"]');
    const image = document.querySelector('[name="edit_image"]');

    edit_destination_toggle.forEach(element => {
        element.addEventListener('click', () => {
            const raw_data = element.getAttribute('data');
            const data = JSON.parse(raw_data);

            edit_form_destination.classList.remove('hidden');
            add_form_destination.classList.add('hidden');

            const destination_dropdown = document.querySelectorAll('.destination_dropdown');
            destination_dropdown.forEach(element => {
                element.classList.add('hidden');
            });

            console.log(data);

            id.setAttribute('value', data.id);
            user_id.setAttribute('value', data.user_id);
            judul.setAttribute('value', data.judul);
            tanggal.setAttribute('value', data.tanggal);
            budget.setAttribute('value', data.budget);
            lama_liburan.setAttribute('value', data.lama_liburan);
            image.setAttribute('value', data.image);
        })
    });
} catch (err) {
    console.log(err);
}

// Delete destination
try {
    const delete_toggle = document.querySelectorAll('.delete_destination');

    delete_toggle.forEach(element => {
        element.addEventListener('click', ()=> {
            return confirm('apakah anda yakin?');
        })
    })
} catch (err) {
    console.log(err);
}

// Location edit toggle
try {
    const location_edit_toggle = document.querySelectorAll('.location_edit_toggle');
    const location_edit_form = document.getElementById('edit_form_location');
    const toggle_output = document.getElementById('location_form');

    const location = document.querySelector('[name="edit_location"]');
    const id = document.querySelector('[name="edit_id"]');

    location_edit_toggle.forEach(element => {
        element.addEventListener('click', ()=> {
            location_edit_form.classList.remove('hidden');
            toggle_output.classList.add('hidden');
            location.setAttribute('value', element.getAttribute('data'));
            id.setAttribute('value', element.getAttribute('data-id'));
        })
    })
} catch (err) {
    console.log(err);
}

// Location delete toggle
try {
    const location_delete_toggle = document.querySelectorAll('.location_delete_toggle');

    location_delete_toggle.forEach(element => {
        element.addEventListener('click', ()=> {
            return confirm('apakah anda yakin?');
        })
    })
} catch (err) {
    console.log(err);
}

// Edit activity toggle
try {
    const activity_edit_toggle = document.querySelectorAll('.activity_edit_toggle');
    const activity_edit_form = document.getElementById('activity_edit_form');
    const activity_form = document.getElementById('form_activity');

    const id = document.querySelector('[name="edit_activity_id"]');
    const activity = document.querySelector('[name="edit_activity"]');
    const schedule = document.querySelector('[name="edit_schedule"]');
    const time = document.querySelector('[name="edit_time"]');

    activity_edit_toggle.forEach(element => {
        element.addEventListener('click', ()=> {
            activity_edit_form.classList.remove('hidden');
            activity_form.classList.add('hidden');
            const data = JSON.parse(element.getAttribute('data'));
            let tgl = new Date(data.schedule).toLocaleDateString('en-CA');

            id.setAttribute('value', data.id);
            activity.setAttribute('value', data.activities);
            schedule.setAttribute('value', tgl);
            time.setAttribute('value', data.time);
        })
    });
} catch (err) {
    console.log(err);
}