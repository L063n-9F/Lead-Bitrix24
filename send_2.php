<?php
$queryUrl = "https://b24-x18kac.bitrix24.ru/rest/1/s16zvj6vs0r4h672/crm.lead.add.json";
$queryData = http_build_query([
    "fields" => [
        "TITLE" => "Отправка Лида в Битрикс24",
        "NAME" => $_POST["NAME"],
        "PHONE" => [
            [
                "VALUE" => $_POST["PHONE"],
                "VALUE_TYPE" => "WORK",
            ],
        ],
        "EMAIL" => [
            [
                "VALUE" => $_POST["EMAIL"],
                "VALUE_TYPE" => "HOME",
            ],
        ],
    ],
    "params" => ["REGISTER_SONET_EVENT" => "Y"],
]);
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $queryUrl,
    CURLOPT_POSTFIELDS => $queryData,
]);
$result = curl_exec($curl);
curl_close($curl);
?>