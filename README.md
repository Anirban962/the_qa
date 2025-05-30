# the_qa
# Tata tiscon contact map code step by step

Its all under a custom plugin name : Tata Tiscon
// contact-map code 
 
document.addEventListener('DOMContentLoaded', function () {
  const allStates = document.querySelectorAll('svg.india > a');

  allStates.forEach(state => {
    state.addEventListener('click', function () {
      allStates.forEach(s => s.classList.remove('active'));
      this.classList.add('active');

      const stateId = this.getAttribute('data-name');
      document.getElementById('state-name').textContent = stateId;

      fetch(contact_map_obj.ajax_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action: 'get_state_data',
          state_id: stateId
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const info = data.data;

          document.getElementById('state-contact-name').textContent = info.contact_name || '';
          document.getElementById('state-location').textContent = info.location || '';
          document.getElementById('state-phone').innerHTML = info.phone
            .split('/')
            .map(p => `<a href="tel:${p.trim()}">${p.trim()}</a>`)
            .join(' / ');
          document.getElementById('state-email').innerHTML = info.email
            .split('/')
            .map(e => `<a href="mailto:${e.trim()}">${e.trim()}</a>`)
            .join(' / ');
          document.getElementById('state-distributor').textContent = info.distributor || '';
        } else {
          populateEmptyFields(stateId);
        }
      });
    });
  });

  function populateEmptyFields(stateId) {
    document.getElementById('state-name').textContent = stateId || 'N/A';
    document.getElementById('state-contact-name').textContent = '';
    document.getElementById('state-location').textContent = '';
    document.getElementById('state-phone').innerHTML = '';
    document.getElementById('state-email').innerHTML = '';
    document.getElementById('state-distributor').textContent = '';
  }
});

_________________________File name: script.js


// contact-map-code
add_action('wp_ajax_get_state_data', 'get_state_data_callback');
add_action('wp_ajax_nopriv_get_state_data', 'get_state_data_callback');

function get_state_data_callback() {
    $state_id = isset($_POST['state_id']) ? sanitize_text_field($_POST['state_id']) : '';
    $response = ['success' => false];

    if ($state_id && have_rows('contact_map_wrapper', 'option')) {
        while (have_rows('contact_map_wrapper', 'option')) {
            the_row();
            $acf_state_id = get_sub_field('state_id');

            if (strtolower(trim($acf_state_id)) === strtolower(trim($state_id))) {
                $response = [
                    'success' => true,
                    'data' => [
                        'contact_name' => get_sub_field('name'),
                        'location' => get_sub_field('sales_office'),
                        'phone' => get_sub_field('phone'),
                        'email' => get_sub_field('email'),
                        'distributor' => get_sub_field('distributor_description'),
                    ]
                ];
                break;
            }
        }
    }

    wp_send_json($response);
}
_______________________________________File name: ajax.php



// ajax enqueue for contact map
function enqueue_map_script() {
    wp_enqueue_script('map-handler', plugin_dir_url(__FILE__) . '../assets/script.js', ['jquery'], null, true);
    wp_localize_script('map-handler', 'contact_map_obj', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
// add_action('admin_enqueue_scripts', 'enqueue_map_script');
add_action('wp_enqueue_scripts', 'enqueue_map_script');

// ajax enqueue for contact map ends
__________________________________________________File Name: enqueue-scripts.php
