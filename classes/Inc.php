<?php


class Inc
{
    public static function header()
    {
        echo 
        '<!DOCTYPE html>
        <html lang="en">

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="icon" href="./assets/images/logo.png" type="image/x-icon"/>
        <link rel="stylesheet" href="assets/css/vendors/all.min.css">
        <link rel="stylesheet" href="assets/css/vendors/bootstrap.rtl.min.css">
        <link rel="stylesheet" href="assets/css/vendors/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/vendors/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/main.min.css">
        </head>

        <body>';
    }

    public static function footer()
    {
        echo 
            '<footer class="footer text-white">
            <div class="footer__upper">
            <div class="section-container row">
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="footer__logo">
                    <img class="w-100" src="assets/images/logo.png" alt="">
                </div>
                <p class="my-3 text-gray">شركتنا هي أكبر شركة متخصصة لبيع الاحذية أونلاين وتوصيلها حتي المنزل.</p>
                <div class="footer__social d-flex gap-3">
                    <a href=""><i class="fa-brands fa-facebook fa-2x text-white"></i></a>
                    <a href=""><i class="fa-brands fa-instagram fa-2x text-white"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok fa-2x text-white"></i></a>
                </div>
                </div>
                <div class="col-md-6 col-lg-3 px-md-4 mb-5 mb-lg-0">
                <div class="footer__list-title fw-bolder mb-1">
                    عن Coding arabic
                </div>
                <div class="footer__list list-unstyled p-0">
                    <li><a class="footer__link text-decoration-none d-inline-block text-gray py-1" href="about.html">من نحن</a></li>
                    <li><a class="footer__link text-decoration-none d-inline-block text-gray py-1" href="contact.html">تواصل معنا</a></li>
                    <li><a class="footer__link text-decoration-none d-inline-block text-gray py-1" href="privacy-policy.html">سياسة الخصوصية</a></li>
                    <li><a class="footer__link text-decoration-none d-inline-block text-gray py-1" href="refund-policy.html">سياسة الاستبدال و
                        الاسترجاع</a></li>
                    <li><a class="footer__link text-decoration-none d-inline-block text-gray py-1" href="track-order.html">تتبع طلبك</a></li>
                </div>
                </div>
                <div class="col-md-6 col-lg-3 px-md-4 mb-5 mb-lg-0">
                <div class="footer__list-title fw-bolder mb-1">
                    فروعنا
                </div>
                <div class="footer__list">
                    <div class="d-flex gap-3 mb-3">
                    <div class="fs-5"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text-gray">فرع طنطا: ش بطرس مع سعيد امام المركز الطبى - طنطا.</div>
                    </div>
                    <div class="d-flex gap-3">
                    <div class="fs-5"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="text-gray">فرع اسكندرية: ش جمال عبد الناصر - تحت كوبرى 45 - ميامى.</div>
                    </div>
                </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div>
                    <div class="footer__list-title fw-bolder mb-1">
                    تحتاج مساعدة ؟
                    </div>
                    <div class="d-flex gap-3 mb-3">
                    <div class="fs-5"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text-gray">coding.arabic@gmail.com</div>
                    </div>
                </div>
                <div>
                    <div class="footer__list-title fw-bolder mb-3">
                    اشترك في نشرتنا
                    </div>
                    <form class="footer__form position-relative">
                    <input
                        class="footer__email-input w-100 bg-transparent border border-white py-2 px-3 rounded-2 text-white pe-5"
                        placeholder="البريد الالكتروني">
                    <button
                        class="footer__submit mx-3 position-absolute top-50 translate-middle-y end-0 bg-transparent border-0 text-white d-flex align-items-center"><i
                        class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <div class="footer__bottom text-center p-3 section-container">
            جميع الحقوق محفوظة Eraasoft 2023
            </div>
        </footer>
        <!-- Footer Section End -->

        <script src="assets/js/vendors/all.min.js"></script>
        <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendors/jquery-3.7.0.js"></script>
        <script src="assets/js/vendors/owl.carousel.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/app.js"></script>
        </body>

        </html>';
    }

    public static function subSectionFromMain($sub_section){
        echo 
        "<main>
            <section
                class='page-top d-flex justify-content-center align-items-center flex-column text-center'>
                <div class='page-top__overlay'></div>
                <div class='position-relative'>
                <div class='page-top__title mb-3'>
                    <h2>$sub_section</h2>
                </div>
                <div class='page-top__breadcrumb'>
                    <a class='text-gray' href='index.html'>الرئيسية</a> /
                    <span class='text-gray'>$sub_section</span>
                </div>
                </div>
            </section>";
    }
}
