<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "../app/php/head.php"; ?>

<link rel="stylesheet" href="/app/css/pages/main.css">

<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/BG1.jpg');">
                <img src="/app/img/users/icons/MAN1.jpg">
            </div>
            <div class="person-profile">

                <div class="person-profile-content">
                    <div class="person-profile-content-name">
                        <p class="person-profile-content-name-1">
                            Даниил Дыбка
                        </p>
                        <p class="person-profile-content-name-2">
                            Описание профиля
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center flex-wrap">
                    <div class="d-flex flex-column flex-wrap me-auto">
                        <p class=" mb-4  font-h display-5">@examplenickname</p>
                        <div class="d-flex flex-wrap align-items-center">
                            <p class="mb-0 text-muted fs-5">
                            </p>
                        </div>
                    </div>
                    <div class="block-icons">
                        <div class="d-flex align-icons me-3 my-3 flex-wrap">
                            <a href="/i/php/users/sub.php?i=5" class="btn btn-dark text-white padding-name-icon d-flex fs-6 flex-wrap px-3 align-items-center m-1" style="border-radius: 16px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg>
                            </a>
                            <button class="btn btn-dark text-white padding-name-icon d-flex fs-5 flex-wrap px-3 align-items-center m-1" style="border-radius: 16px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"></path>
                                </svg>
                            </button>
                            <button class="btn btn-dark text-white padding-name-icon d-flex fs-5 px-4 flex-wrap align-items-center m-1" style="border-radius: 16px" data-bs-toggle="collapse" data-bs-target="#collapse_moredetail" aria-expanded="false" aria-controls="collapse_moredetail">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                                Ещё
                            </button>
                        </div>
                    </div>
                </div>
                <!-- <div class="userprofilemoreinfo" style="padding-bottom: 15px">
                    <div class="container text-center">
                        <div class="row row-cols-1 row-cols-lg-4 g-2 g-lg-3">
                            <div class="col">
                                <div class="border-2 border" style="border-radius: 32px">
                                    <div class="d-flex m-1 flex-wrap flex-column">
                                        <p class="fs-2" style="margin-bottom: -7px">1</p>
                                        <p class="fs-6 text-muted mb-0">Подписка</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="border-2 border" style="border-radius: 32px">
                                    <div class="d-flex m-1 flex-wrap flex-column">
                                        <p class="fs-2" style="margin-bottom: -7px">98 тыс.</p>
                                        <p class="fs-6 text-muted mb-0">Подписчиков</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="border-2 border" style="border-radius: 32px">
                                    <div class="d-flex m-1 flex-wrap flex-column">
                                        <p class="fs-2" style="margin-bottom: -7px">2019</p>
                                        <p class="fs-6 text-muted mb-0">год рег.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="border-2 border" style="border-radius: 32px">
                                    <div class="d-flex m-1 flex-wrap flex-column">
                                        <p class="fs-2" style="margin-bottom: -7px">40</p>
                                        <p class="fs-6 text-muted mb-0">Достижений</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->
                <!-- <div class="collapse" id="collapse_moredetail">
                    <div class="mt-3 border-top pb-1 pt-2">
                        <div class="px-4" style="max-width: 900px">
                            <div style="margin-bottom: 30px">
                                <p class="m-0 fs-6 text-muted text-uppercase" style="letter-spacing: 2px">Информация</p>
                                <p class="mb-0 fs-3">
                                    <br>
                                    <a href="/user?n=examplenickname" class="underline">@examplenickname</a><br>
                                </p>
                            </div>
                            <div class="userprofilemoreinfo-mobile" style="padding-bottom: 15px">
                                <div class="text-center">
                                    <div class="d-flex flex-wrap flex-column">
                                        <div class="border-2 mb-2 border" style="border-radius: 32px">
                                            <div class="d-flex m-1 flex-wrap flex-column">
                                                <p class="fs-4" style="margin-bottom: -7px">1</p>
                                                <p class="fs-6 text-muted mb-0">Подписка</p>
                                            </div>
                                        </div>
                                        <div class="border-2 mb-2 border" style="border-radius: 32px">
                                            <div class="d-flex m-1 flex-wrap flex-column">
                                                <p class="fs-4" style="margin-bottom: -7px">98 тыс.</p>
                                                <p class="fs-6 text-muted mb-0">Подписчиков</p>
                                            </div>
                                        </div>
                                        <div class="border-2 mb-2 border" style="border-radius: 32px">
                                            <div class="d-flex m-1 flex-wrap flex-column">
                                                <p class="fs-4" style="margin-bottom: -7px">2019</p>
                                                <p class="fs-6 text-muted mb-0">год рег.</p>
                                            </div>
                                        </div>
                                        <div class="border-2 mb-2 border" style="border-radius: 32px">
                                            <div class="d-flex m-1 flex-wrap flex-column">
                                                <p class="fs-4" style="margin-bottom: -7px">40</p>
                                                <p class="fs-6 text-muted mb-0">Достижений</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
