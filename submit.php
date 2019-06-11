<?php

header("Content-type:application/json;charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $tel = $_POST['tel'];
    $age = $_POST['age'];
    $bd = $_POST['bd'];
    $expected_benefits = $_POST['expected_benefits'];
    $income = $_POST['income'];
    $specialization = $_POST['specialization'];
    $quarter = $_POST['quarter'];
    $half_year = $_POST['half_year'];
    $one_time = $_POST['one_time'];

    if (empty($fn) OR empty($ln) OR empty($tel) OR empty($age) OR empty($bd) OR empty($expected_benefits) OR empty($income) OR empty($specialization) OR empty($quarter) OR empty($half_year) OR empty($one_time)) {

        http_response_code(400);
        $data['response'] = "error";
        echo json_encode($data);
    }
    else{
        $data['response'] = 'success';
        echo json_encode($data);
    }

    /*Przygotowane do wysyłki poprzez email */

//    $recipient = ""; //Pole do wypełnienia przez administratora
//    $email = ""; //Pole do pobrania z formularza (aktualny formularz nie posiada takiego pola)
//    $subject = "Dane do kontaktu od $fn ' ' $ln" ;
//
//    $email_content = "Imię: $fn\n";
//    $email_content .= "Nazwisko: $ln\n\n";
//    $email_content .= "Telefon: $tel\n\n";
//    $email_content .= "Wiek: $age\n\n";
//    $email_content .= "Data urodzenia: $bd\n\n";
//    $email_content .= "Oczekiwane świadczenia miesięczne: $expected_benefits\n\n";
//    $email_content .= "Dochód: $income\n\n";
//    $email_content .= "Specjalizacja: $specialization\n\n";
//    $email_content .= "Składka kwartalna: $quarter\n\n";
//    $email_content .= "Składka półroczna: $half_year\n\n";
//    $email_content .= "Wpłata jednorazowa:\n$one_time\n";
//
//    $email_headers = "Od: $fn <$email>";
//
//
//    if (mail($recipient, $subject, $email_content, $email_headers)) {
//
//        http_response_code(200);
//        echo "Dziękujemy, formularz został poprawnie przesłany!";
//    } else {
//        http_response_code(500);
//        $data['response'] = "error";
//        echo json_encode($data);
//    }

    /*Przygotowane do wysyłki poprzez email */

} else {
    http_response_code(403);
    $data['response'] = "error";
    echo json_encode($data);
}