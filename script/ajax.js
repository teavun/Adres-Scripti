
var xhr = new XMLHttpRequest();

function cities() {
    xhr.open('GET', '/api/cities', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let cities = JSON.parse(xhr.response);
            cities.forEach(element => {
                const opt = createOption(element.CityTitle, element.CityTitle, element.CityKey);
                city.appendChild(opt);
            });
        }
    }
    xhr.send();
}

function towns(cityID) {
    console.log(cityID);
    const link = '/api/city/' + cityID;
    xhr.open('GET', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let towns = JSON.parse(xhr.response);
            towns.forEach(element => {
                const opt = createOption(element.TownTitle, element.TownTitle, element.TownKey);
                town.appendChild(opt);
            });
        }
    }
    xhr.send();
}

function neigborhoods(townID) {
    const link = '/api/town/' + townID;
    xhr.open('GET', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let neigborhoods = JSON.parse(xhr.response);
            neigborhoods.forEach(element => {
                const opt = createOption(element.NeigborhoodTitle, element.NeigborhoodTitle, element.NeigborhoodKey);
                neigborhood.appendChild(opt);
            });
        }
    }
    xhr.send();
}

function roadstreets(neigborhoodID) {
    const link = '/api/neigborhood/' + neigborhoodID;
    xhr.open('GET', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const result = JSON.parse(xhr.response);
            const roads = result.roads;
            const streets = result.streets;
            if (roads) {
                roads.forEach(element => {
                    const opt = createOption(element.RoadTitle, element.RoadTitle);
                    road.appendChild(opt);
                });
            }
            if (streets) {
                streets.forEach(element => {
                    const opt = createOption(element.StreetTitle, element.StreetTitle);
                    street.appendChild(opt);
                });
            }

        }
    }
    xhr.send();
}



function addCity(cityTitle) {

    const link = '/api/city';

    let data = new FormData();
    data.append('CityTitle', cityTitle);

    xhr.open('POST', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            swal("Kaydedildi", "Kayıt İşlemi Başarıyla Gerçekleşti", "success");

            const addedCityKey = xhr.response;
            const opt = createOption(newCity.value, newCity.value, addedCityKey);
            city.appendChild(opt);

            city.selectedIndex = city.options.length - 1;

            newCity.value = '';
        }
    }
    xhr.send(data);
}

function addTown(townTitle, cityKey) {

    const link = '/api/town';

    let data = new FormData();
    data.append('TownTitle', townTitle);
    data.append('CityKey', cityKey);

    xhr.open('POST', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            swal("Kaydedildi", "Kayıt İşlemi Başarıyla Gerçekleşti", "success");

            const addedTownKey = xhr.response;
            const opt = createOption(newTown.value, newTown.value, addedTownKey);
            town.appendChild(opt);

            town.selectedIndex = town.options.length - 1;

            newTown.value = '';
        }
    }
    xhr.send(data);
}



function addNeigborhood(neigborhoodTitle, townKey) {

    const link = '/api/neigborhood';

    let data = new FormData();
    data.append('NeigborhoodTitle', neigborhoodTitle);
    data.append('TownKey', townKey);

    xhr.open('POST', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            swal("Kaydedildi", "Kayıt İşlemi Başarıyla Gerçekleşti", "success");

            const addedNeigborhoodKey = xhr.response;
            const opt = createOption(newNeigborhood.value, newNeigborhood.value, addedNeigborhoodKey);
            neigborhood.appendChild(opt);

            neigborhood.selectedIndex = neigborhood.options.length - 1;

            newNeigborhood.value = '';
        }
    }
    xhr.send(data);
}


function addRoad(roadTitle, neigborhoodKey) {

    const link = '/api/road';

    let data = new FormData();
    data.append('RoadTitle', roadTitle);
    data.append('NeigborhoodKey', neigborhoodKey);

    xhr.open('POST', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            swal("Kaydedildi", "Kayıt İşlemi Başarıyla Gerçekleşti", "success");


            const opt = createOption(newRoad.value, newRoad.value);
            road.appendChild(opt);

            road.selectedIndex = road.options.length - 1;

            newRoad.value = '';
        }
    }
    xhr.send(data);
}


function addStreet(streetTitle, neigborhoodKey) {

    const link = '/api/street';

    let data = new FormData();
    data.append('StreetTitle', streetTitle);
    data.append('NeigborhoodKey', neigborhoodKey);

    xhr.open('POST', link, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            swal("Kaydedildi", "Kayıt İşlemi Başarıyla Gerçekleşti", "success");

            const opt = createOption(newStreet.value, newStreet.value);
            street.appendChild(opt);

            street.selectedIndex = street.options.length - 1;


            newStreet.value = '';
        }
    }
    xhr.send(data);
}

function sendSelectedAddress(fd) {

    const link = "/views/main.view.php";
    xhr.open("POST", link);
    xhr.onreadystatechange = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            console.log(xhr.response);
        }
    }

    xhr.send(fd);
}