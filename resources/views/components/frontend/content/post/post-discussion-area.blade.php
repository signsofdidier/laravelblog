<section class="gazette-post-discussion-area section_padding_100 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Comment Area Start -->
                <div class="comment_area section_padding_50 clearfix">
                    <div class="gazette-heading">
                        <h4 class="font-bold">Discussion</h4>
                    </div>

                    <ol>
                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <div class="comment-wrapper d-md-flex align-items-start">
                                <!-- Comment Meta -->
                                <div class="comment-author">
                                    <img src="{{ asset('assets/frontend/img/blog-img/25.jpg') }}" alt="">
                                </div>
                                <!-- Comment Content -->
                                <div class="comment-content">
                                    <h5>John Doe</h5>
                                    <span class="comment-date font-pt">December 18, 2017</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum nunc libero, vitae rutrum nunc porta id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam arcu augue, semper at elementum nec, cursus nec ante.</p>
                                    <a class="reply-btn" href="#">Reply <i class="fa fa-reply" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <ol class="children">
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-md-flex align-items-start">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="{{ asset('assets/frontend/img/blog-img/25.jpg') }}" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <h5>John Doe</h5>
                                            <span class="comment-date text-muted">December 18, 2017</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum nunc libero, vitae rutrum nunc porta id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam arcu augue, semper at elementum nec, cursus nec ante.</p>
                                            <a class="reply-btn" href="#">Reply <i class="fa fa-reply" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
                <!-- Leave A Comment -->
                <div class="leave-comment-area clearfix">
                    <div class="comment-form">
                        <div class="gazette-heading">
                            <h4 class="font-bold">leave a comment</h4>
                        </div>
                        <!-- Comment Form -->
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="contact-name" placeholder="Enter Your Full Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="contact-email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
