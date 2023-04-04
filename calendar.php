<?php
    // DB 연결 설정
    $servername = "localhost";
    $db_mem_ID = "root";
    $db_pass_no = "root506";
    $dbname = "todolist";

    $conn = new mysqli($servername, $db_mem_ID, $db_pass_no, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // todolist 테이블에서 데이터를 가져옴
    $sql = "SELECT * FROM todolist";
    $result = $conn->query($sql);
    
    // 현재 날짜 구하기
    $today = date('Y-m-d');

    // 달력에 출력할 날짜 구하기
    $year = date('Y');
    $month = date('m');
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // 달력 출력
    for ($i = 1; $i <= $daysInMonth; $i++) {
        // 현재 날짜와 비교하여 오늘인 경우 circle 클래스 추가
        $class = ($today == "$year-$month-$i") ? "circle" : "";

        // todolist 테이블에서 해당 날짜의 데이터가 있는지 확인
        $sql = "SELECT * FROM todolist WHERE from_date <= '$year-$month-$i' AND to_date >= '$year-$month-$i'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();

        // 해당 날짜의 배경색과 글자색 결정
        $bgcolor = "";
        $textcolor = "";
        if ($data) {
            $bgcolor = "#6886c5";
            $textcolor = "#fff";
        }

        // head 칼럼의 길이가 5 이상인 경우 5글자 + ...으로 축약
        $head = $data['head'];
        if (strlen($head) > 5) {
            $head = substr($head, 0, 5) . "...";
        }

        // 해당 날짜 출력
        echo "<div class='calendar-date $class' style='background-color: $bgcolor; color: $textcolor;'>$i<br>$head</div>";
    }

    // DB 연결 종료
    $conn->close();
?>