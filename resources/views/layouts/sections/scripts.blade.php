<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggler = document.querySelectorAll('.form-password-toggle i');
    if (typeof toggler !== 'undefined' && toggler !== null) {
      toggler.forEach(el => {
        el.addEventListener('click', e => {
          e.preventDefault();
          const formPasswordToggle = el.closest('.form-password-toggle');
          const formPasswordToggleIcon = formPasswordToggle.querySelector('i');
          const formPasswordToggleInput = formPasswordToggle.querySelector('input');

          if (formPasswordToggleInput.getAttribute('type') === 'text') {
            formPasswordToggleInput.setAttribute('type', 'password');
            formPasswordToggleIcon.classList.replace('mdi-eye-outline', 'mdi-eye-off-outline');
          } else if (formPasswordToggleInput.getAttribute('type') === 'password') {
            formPasswordToggleInput.setAttribute('type', 'text');
            formPasswordToggleIcon.classList.replace('mdi-eye-off-outline', 'mdi-eye-outline');
          }
        });
      });
    }
  });
</script>
<script>
function confirmBooking() {
    // Get the form data
    var fullname = document.getElementById('fullname').value;
    var salon = document.getElementById('salon_name').value;
    var treatment = document.getElementById('treatment_name').options[document.getElementById('treatment_name').selectedIndex].text;
    var book_date = document.getElementById('book_date').value;
    var book_time = document.getElementById('book_time').value;
    var treatment_price = parseFloat(document.getElementById('treatment_price').value); // Parse treatment price as float

    if (!fullname || !salon || !treatment || !book_date || !book_time || isNaN(treatment_price)) {
        alert("Please fill in all required fields.");
        return;
    }

    // Calculate total price (treatment price + service fee)
    var service_fee = 10000;
    var total_price = treatment_price + service_fee;

    // Set the total price in the hidden input field
    document.getElementById('total_price').value = total_price.toFixed(2);

    // Set the values in the confirmation modal
    document.getElementById('modalFullname').innerText = fullname;
    document.getElementById('modalSalon').innerText = salon;
    document.getElementById('modalTreatment').innerText = treatment;
    document.getElementById('modalDate').innerText = book_date;
    document.getElementById('modalTime').innerText = book_time;
    document.getElementById('modalTreatmentPrice').innerText = 'Rp ' + treatment_price.toFixed(2);
    document.getElementById('modalServiceFee').innerText = 'Rp ' + service_fee.toFixed(2);
    document.getElementById('modalTotalPrice').innerText = 'Rp ' + total_price.toFixed(2);

    // Show the confirmation modal
    $('#confirmationModal').modal('show');
}


</script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
