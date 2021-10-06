<?
require_once('src/crest.php');
    $sName = htmlspecialchars($_POST["NAME"]);	
    $sPhone = htmlspecialchars($_POST["PHONE"]);
    $sEmail = htmlspecialchars($_POST["EMAIL"]);
        
    $arPhone = (!empty($sPhone)) ? array(array('VALUE' => $sPhone, 'VALUE_TYPE' => 'WORK')) : array();
    $arEmail = (!empty($sEmail)) ? array(array('VALUE' => $sEmail, 'VALUE_TYPE' => 'HOME')) : array();

    $result = CRest::call(
        'crm.lead.add',
        [
        'fields' =>[
            'TITLE' => 'Отправка Лида в Битрикс24',
            'NAME' => $sName,
            'PHONE' => $arPhone,
            'EMAIL' => $arEmail,
        ]
    ]);
    if(!empty($result['result'])){
        echo json_encode(['message' => 'Lead add']);
    }elseif(!empty($result['error_description'])){
        echo json_encode(['message' => 'Lead not added: '.$result['error_description']]);
    }else{
        echo json_encode(['message' => 'Lead not added']);
    }
?>