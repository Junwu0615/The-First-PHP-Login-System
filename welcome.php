<!DOCTYPE html>
<html>
    <head>
        <!-- 歡迎介面 -->
        <meta charset='utf-8'>
        <title> 歡迎介面 </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link href="css/web.css" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/templatemo-topic-listing.css" rel="stylesheet">
    </head>
    <body>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

        <main>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand">
                        <i class="bi-back"></i>
                        <span>PC Area</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">Something Interesting</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="logout.php" class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    </div>

                    <ul></ul>

                    <div class="test">
                        <?php
                        /*最後則是welcome.php，為使用者成功登入後看到的畫面
                        之後可以透過$_SESSION控制不同身分使用者看到不同畫面*/

                        //可將變數儲存在session
                        session_start();

                        $username=$_SESSION["username"];
                        $id=$_SESSION["id"];

                        echo "<h6> Hello!　ID: ".$id."　|　User: ".$username."</h6>";
                        echo "<h6> Now: " .date('Y-m-d H:i:s'). "</h6>";
                        echo "<h6> <a href='logout.php'>登出</a> <h6>";
                        ?>
                    </div>
                </div>
            </nav>
            <section class="beautify_1" d-flex justify-content-center align-items-center></section>
            <section class="explore-section section-padding" id="section_1">

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="mb-4">Something Interesting</h1>
                        </div>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Anime List</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">Nice Web</button>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="https://www.google.com/search?q=進擊的巨人">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">進擊的巨人</h5>

                                                            <p class="mb-0">故事建立在人類與巨人之間的衝突，人類居住在由高牆包圍的城市，對抗牆外會吃人的巨人，並尋找著關於巨人的答案。</p>
                                                        </div>

                                                        <span class="badge bg-design rounded-pill ms-auto">100</span>
                                                    </div>

                                                    <img src="https://truth.bahamut.com.tw/s01/202311/021a1498e298720c6ed3cb94f0bb72da.JPG" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="custom-block bg-white shadow-lg">
                                                <a href="https://www.google.com/search?q=間諜家家酒">
                                                    <div class="d-flex">
                                                        <div>
                                                            <h5 class="mb-2">間諜家家酒</h5>

                                                                <p class="mb-0">本作敘述一名身分為間諜的男性，和另一位實際工作是殺手的女性，以及一個能讀心的超能力者女孩，三人互相隱瞞真實身分所組成的虛假家庭間的家庭喜劇。</p>
                                                        </div>

                                                        <span class="badge bg-design rounded-pill ms-auto">50</span>
                                                    </div>

                                                    <img src="https://im.marieclaire.com.tw/m800c533h100b0/assets/mc/202310/65296A484710B1697213000.jpeg" width="5" height="1000" class="custom-block-image img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="https://steam.oxxostudio.tw/">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">STEAM 教育學習網</h5>

                                                                <p class="mb-0">學習網秉持著STEAM/STEM的精神，透過一系列免費且高品質的教學與範例，讓所有人都能輕鬆跨入 STEAM 的學習領域</p>
                                                            </div>

                                                            <span class="badge bg-advertising rounded-pill ms-auto">30</span>
                                                        </div>

                                                        <img src="img/steam.JPG" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="https://opendata.cwa.gov.tw/index">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">氣象資料開放平臺</h5>

                                                                <p class="mb-0">公開資料能讓人自由的使用，以造就更多程序服務被開發。</p>
                                                            </div>

                                                            <span class="badge bg-advertising rounded-pill ms-auto">65</span>
                                                        </div>

                                                        <img src="img/氣象資料開放平臺.JPG" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="https://data.gov.tw/">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">政府資料開放平台</h5>

                                                                <p class="mb-0">公開資料能讓人自由的使用，以造就更多程序服務被開發。</p>
                                                            </div>

                                                            <span class="badge bg-advertising rounded-pill ms-auto">50</span>
                                                        </div>

                                                        <img src="img/政府資料開放平台.JPG" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="custom-block bg-white shadow-lg">
                                                    <a href="https://templatemo.com/">
                                                        <div class="d-flex">
                                                            <div>
                                                                <h5 class="mb-2">templatemo</h5>

                                                                <p class="mb-0">免費公開588+多個css樣板，可以將範本用於商業、個人或學習目的。</p>
                                                            </div>

                                                            <span class="badge bg-advertising rounded-pill ms-auto">50</span>
                                                        </div>

                                                        <img src="img/templatemo.JPG" class="custom-block-image img-fluid" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>