<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adres Seçim Formu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <h3 class="text-center"> Adres Seçim Formu </h3>
        <br>
        <form method="POST" action="/views/main.view.php">
            <div id="cityBox">
                <div class="form-group row">
                    <label for="city" class="col-sm-1 col-form-label"> Şehir </label>
                    <div class="col-sm-9">
                        <select id="city" name="city" class="form-control">
                            <option selected value="-1">Seçiniz</option>
                        </select>
                    </div>
                    <button type="button" class="col-sm-2 btn btn-primary"> Yeni Şehir </button>
                </div>
                <div class="form-group row" hidden>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" placeholder="Yeni İlin İsmini Giriniz" id="newcity">
                    </div>
                    <button class="col-sm-1 btn btn-success btn-sm" type="button"> Kaydet </button>
                </div>
            </div>
            <div id="townBox">
                <div class="form-group row">
                    <label for="town" class="col-sm-1 col-form-label">İlçe</label>
                    <div class="col-sm-9">
                        <select id="town" name="town" class="form-control">
                            <option selected  value="-1">Seçiniz</option>
                        </select>
                    </div>
                    <button type="button" class="col-sm-2 btn btn-primary"> Yeni İlçe </button>
                </div>
                <div class="form-group row" hidden>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="newtown" placeholder="Yeni İlçenin İsmini Giriniz">
                    </div>
                    <button class="col-sm-1 btn btn-success btn-sm" type="button"> Kaydet </button>
                </div>
            </div>
            <div id="neigborhoodBox">
                <div class="form-group row">
                    <label for="neigborhood" class="col-sm-1 col-form-label">Mahalle</label>
                    <div class="col-sm-9">
                        <select id="neigborhood" name="neigborhood" class="form-control">
                            <option selected  value="-1">Seçiniz</option>
                        </select>
                    </div>
                    <button type="button" class="col-sm-2 btn btn-primary"> Yeni Mahalle </button>
                </div>
                <div class="form-group row" hidden>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="newneigborhood" placeholder="Yeni Mahallenin İsmini Giriniz">
                    </div>
                    <button class="col-sm-1 btn btn-success btn-sm" type="button"> Kaydet </button>
                </div>
            </div>
            <div id="roadBox">
                <div class="form-group row">
                    <label for="road" class="col-sm-1 col-form-label"> Cadde</label>
                    <div class="col-sm-9">
                        <select id="road" name="road" class="form-control">
                            <option selected  value="-1">Seçiniz</option>
                        </select>
                    </div>
                    <button type="button" class="col-sm-2 btn btn-primary"> Yeni Cadde</button>
                </div>
                <div class="form-group row" hidden>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" placeholder="Yeni Caddenin İsmini Giriniz" id="newroad">
                    </div>
                    <button class="col-sm-1 btn btn-success btn-sm" type="button"> Kaydet </button>
                </div>
            </div>
            <div id="streetBox">
                <div class="form-group row">
                    <label for="street" class="col-sm-1 col-form-label">Sokak</label>
                    <div class="col-sm-9">
                        <select id="street" name="street" class="form-control">
                            <option selected  value="-1">Seçiniz</option>
                        </select>
                    </div>
                    <button type="button" class="col-sm-2 btn btn-primary"> Yeni Sokak</button>
                </div>
                <div class="form-group row" hidden>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="newstreet" placeholder="Yeni sokağın ismini giriniz..">
                    </div>
                    <button class="col-sm-1 btn btn-success btn-sm" type="button"> Kaydet </button>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="sendButton"> Seçilen Adresi Gönder </button>
        </form>
    </div>

    <script src="/script/sweetalert.min.js"></script>

    <script src="/script/globals.js"></script>
    <script src="/script/ajax.js"></script>
    <script src="/script/script.js"></script>

</body>

</html>