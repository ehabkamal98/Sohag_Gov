
<section class="footer-area pt-50 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 p-5 pt-0 pb-0">
                <div class="single-footer-widget">
                    <a class="" href="{{route('home')}}">
                        <img src="{{asset('assets/img/webWhite.png')}}">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 p-5">
                <div class="single-footer-widget text-center">
                    <h2>للاشتراك</h2>
                    <div class="widget-subscribe-content">
                        <p>قم بأدخال بريدك الالكتروني لمتابعتنا وليصلك كل ما هو جديد</p>
                        <section id="newsletter" >
                              <form action="{{route('add_email')}}" method="POST">
                                  @csrf
                                  <input type="email" class="text-center" name="email" placeholder="اكتب بريدك الالكتروني " oninvalid="this.setCustomValidity('برجاء كتابة بريدك الالكتروني')" oninput="setCustomValidity('')" required><input type="submit" value="اشتراك">
                              </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

