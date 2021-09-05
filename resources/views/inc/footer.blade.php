
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
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script>
   /* $(document).ready(function(){
        $("#form_email").submit(function(e) {
            var email = $("#input_email").val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: "{{ route('add_email') }}",
                data:{email:email, _token:_token},
                success: function(data)
                {
                    $("#button_email").text("تم ارسال بريدك الالكتروني بنجاح");
                    $("#input_email").val("تم ارسال بريدك الالكتروني بنجاح");
                },
                error:function (data) {
                    console.log(data);
                }
            });
        });
    });*/
</script>

