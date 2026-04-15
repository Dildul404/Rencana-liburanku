// location toggle
const toggle = document.getElementById('location_toggle');
const toggle_output = document.getElementById('location_form');
const form_btn = document.getElementById('location_form_btn');

toggle.addEventListener('click', () => {
    toggle_output.classList.remove('hidden');
})

form_btn.addEventListener('click', () => {
    toggle_output.classList.add('hidden');
})

// activities toggle
const activity_toggle = document.getElementById('activity_toggle');
const activity_form = document.getElementById('form_activity');

activity_toggle.addEventListener('click', () => {
    activity_form.classList.remove('hidden');
})