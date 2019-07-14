<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adres Sonuç Ekranı</title>
</head>

<body>
    <h3>Adresleme Sonucu</h3>
    <b> İl </b>
    <p> <?= $_POST['city'] != "-1" ? $_POST['city'] : "Belirtilmedi" ?></p> <br>
    <b> İlçe </b>
    <p> <?= $_POST['town'] != "-1" ? $_POST['town'] : "Belirtilmedi" ?> </p> <br>
    <b> Mahalle </b>
    <p> <?= $_POST['neigborhood'] != "-1" ? $_POST['neigborhood'] : "Belirtilmedi" ?> </p> <br>
    <b> Cadde </b>
    <p> <?= $_POST['road'] != "-1" ? $_POST['road'] : "Belirtilmedi" ?> </p> <br>
    <b> Sokak </b>
    <p> <?= $_POST['street'] != "-1" ? $_POST['street'] : "Belirtilmedi" ?></p> <br>
</body>

</html>