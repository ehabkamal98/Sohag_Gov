
<section class="footer-area pt-50 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="single-footer-widget">
                    <a href="{{route('home')}}">
                        <img src="{{asset('assets/img/webWhite.png')}}">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="single-footer-widget">
                    <h2>للاشتراك</h2>
                    <div class="widget-subscribe-content">
                        <p>قم بأدخال بريدك الالكتروني لمتابعتنا وليصلك كل ما هو جديد</p>
                        <form class="newsletter-form" id="form_email">
                            @csrf
                            <input type="email" id="input_email" class="input-newsletter " placeholder=" ... ادخل بريدك الاليكتروني" name="EMAIL" required>
                            <button type="submit" id="button_email">اشتراك</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<script>

    $(document).ready(function(){

        // Emails
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


    });


</script>

