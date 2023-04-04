<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What's up today?</title>
    <link rel="icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&family=Montserrat:wght@300;400;500&family=Gugi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./css/initial.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>

    <div id="main">
        <header id="header">
            <ul id="gnb">
                <li class="liClick">
                    <a href="#HOME" class="aClick"><span class="material-symbols-outlined spanClick">Home</span>Home</a>
                </li>
                <li>
                    <a href="#MYLISTS"><span class="material-symbols-outlined spanClick">check_box</span>MYLISTS</a>
                </li>
                <li>
                    <a href="#LISTDETAIL"><span class="material-symbols-outlined">view_timeline</span>LISTDETAIL</a>
                </li>
                <li>
                    <a href="#CALENDAR"><span class="material-symbols-outlined">calendar_month</span>CALENDAR</a>
                </li>
            </ul>

        </header>
        <div id="HOME">
            <section class="login">
                <?php include('login.php'); ?>
            </section>
        </div>


        <div id="MYLISTS" class="hidden">

        </div>

        <div id="LISTDETAIL" class="hidden">


        </div>

        <div id="CALENDAR" class="hidden">

            <div class="calendar">
                <div class="calendar-header">
                    <div class="calendar-day">일</div>
                    <div class="calendar-day">월</div>
                    <div class="calendar-day">화</div>
                    <div class="calendar-day">수</div>
                    <div class="calendar-day">목</div>
                    <div class="calendar-day">금</div>
                    <div class="calendar-day">토</div>
                </div>
                <div class="calendar-body">
                    <?php include('calendar.php'); ?>
                </div>
            </div>

        </div>
    </div>

</body>
<script>
    const pages = document.querySelectorAll('#main>div');
    const gnbBtns = document.querySelectorAll('#gnb>li');

    for (let i = 0; i < gnbBtns.length; i++) {
        gnbBtns[i].addEventListener("click", function() {
            for (let j = 0; j < pages.length; j++) {
                if (pages[j].hidden === false) {
                    pages[j].classList.add('hidden');
                    gnbBtns[j].classList.remove('liClick');
                    gnbBtns[j].querySelector('a').classList.remove('aClick');
                    gnbBtns[j].querySelector('span').classList.remove('spanClick');
                }
            }
            pages[i].classList.toggle('hidden');
            gnbBtns[i].classList.add('liClick');
            gnbBtns[i].querySelector('a').classList.add('aClick');
            gnbBtns[i].querySelector('span').classList.add('spanClick');
        })
    }
</script>


</html>