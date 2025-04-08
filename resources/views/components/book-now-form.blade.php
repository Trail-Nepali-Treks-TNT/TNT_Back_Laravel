<link rel="stylesheet" href="{{ asset('assets/css/client-styles/book-now-form.css') }}">

<div class="modal fade" id="bookNowFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="bookNowFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title book-now-title font-playfair" id="staticBackdropLabel">Let’s Book Your Trip!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="book-now-form-container p-2">
                    <form id="book-now-form" class="needs-validation d-flex flex-column gap-2 align-items-start"
                        novalidate>
                        @csrf

                        <div class="w-100">
                            <label for="full_name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                placeholder="Enter full name" required pattern="^[A-Za-z\s]{2,}$">
                            <div class="invalid-feedback">
                                Please enter your full name (at least 2 letters, letters only).
                            </div>
                        </div>

                        <div class="w-100">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="Enter email address">
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <div class="w-100">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                pattern="^\+?[0-9\s\-]{7,15}$" placeholder="Enter phone number">
                            <div class="invalid-feedback">
                                Please enter a valid phone number.
                            </div>
                        </div>

                        <div class="w-100">
                            <label for="travel_date" class="form-label">Preferred Travel Date *</label>
                            <input type="date" class="form-control" id="travel_date" name="travel_date" required
                                placeholder="Select travel date" min="{{ now()->format('Y-m-d') }}">
                            <div class="invalid-feedback">
                                Please select your preferred travel date.
                            </div>
                        </div>

                        <div class="w-100">
                            <label for="guests" class="form-label">Number of Guests *</label>
                            <input type="number" class="form-control" id="guests" name="guests" min="1" required
                                placeholder="Enter number of guests" pattern="^[1-9][0-9]*$">
                            <div class="invalid-feedback">
                                Please enter the number of guests (at least 1).
                            </div>
                        </div>

                        <div class="w-100">
                            <label for="message" class="form-label">Special Requests / Notes</label>
                            <textarea class="form-control" id="message" name="message" rows="4"
                                placeholder="Enter message"></textarea>
                        </div>

                        <input type="hidden" name="tour_package" value="{{ $tourPackageName ?? 'Generic Inquiry' }}">

                        <div class=" form-check">
                            <input type="checkbox" class="form-check-input" id="consent" name="consent" required>
                            <label class="form-check-label" for="consent">I agree to be contacted about this
                                inquiry.</label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>

                        <button type="submit" id="sent-btn" class="book-now-btn btn-sm">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset("assets/js/client-scripts/toast.js") }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<script type="text/javascript">
    emailjs.init('23rFCnaNwUv4VkXs9')
    const bookNowForm = document.getElementById('book-now-form');
    const bookNowFormModal = document.getElementById('bookNowFormModal');
    const sentBtn = document.getElementById('sent-btn');

    // Bootstrap validation
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();

    bookNowForm.addEventListener('submit', function (e) {
        e.preventDefault();
        sentBtn.value = 'Sending...';
        sentBtn.disabled = true;
        const serviceID = 'default_service';
        const templateID = 'template_few7k68';
        emailjs.sendForm(serviceID, templateID, this)
            .then(() => {
                sentBtn.value = 'Book Now';
                showToast('Trip booked successfully', 'success')
                bookNowFormModal.hide();
                bookNowForm.reset();
                bookNowForm.classList.remove('was-validated');
            }, (err) => {
                sentBtn.value = 'Book Now'
                alert(JSON.stringify(err));
                const errorMessage = JSON.stringify(err) ?? 'Something went wrong. Pleae try again later';
                showToast(errorMessage, 'error')
            });
    });
    //Reset form data on modal close
    bookNowFormModal.addEventListener('hidden.bs.modal', function () {
        bookNowForm.reset();
        bookNowForm.classList.remove('was-validated');
    });


</script>
