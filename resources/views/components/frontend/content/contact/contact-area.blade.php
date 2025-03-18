<section class="gazette-contact-area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="gazette-heading">
                    <h4 class="font-bold">address</h4>
                </div>
                <!-- Contact Form -->
                <form action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="contact-name" placeholder="Enter Your Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="contact-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="btn contact-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                </form>
            </div>
            <div class="col-12 col-md-4">
                <div class="gazette-heading">
                    <h4 class="font-bold">address</h4>
                </div>
                <div class="contact-address-info mb-50">
                    <p>Address: 1635 Franklin Street <br> City / State: Montgomery, AL 36104 <br> Phone: 126-632-2345</p>
                </div>
                <div class="gazette-heading">
                    <h4 class="font-bold">Phone</h4>
                </div>
                <div class="contact-address-info">
                    <p>Phone #1: 126-632-2345 <br>Phone #2: 126-632-2345 <br>Phone #3: 126-632-2345 <br>Phone #4: 126-632-2345</p>
                </div>
            </div>
        </div>
    </div>
</section>
