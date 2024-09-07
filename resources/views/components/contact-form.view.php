<form id="contact-form">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="name" placeholder="Your Name">
                <label for="name">Your Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="Your Email">
                <label for="email">Your Email</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <input type="text" class="form-control" id="subject" placeholder="Subject">
                <label for="subject">Subject</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message"
                                          style="height: 100px"></textarea>
                <label for="message">Message</label>
            </div>
        </div>
        <div class="col-12">
            <button id="btn-submit-contact-form" class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
        </div>
    </div>
</form>
