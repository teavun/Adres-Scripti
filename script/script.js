city.onchange = function (e) {
  const key = parseInt(city[city.selectedIndex].dataset.key);
  if (key) {
    town.innerText = '';
    neigborhood.innerText = '';
    road.innerText = '';
    street.innerText = '';

    town.innerHTML = '<option value="-1"> Seçiniz </option>';
    towns(key);
  }
  else {
    town.innerHTML = '<option value="-1"> Seçiniz </option>';
    neigborhood.innerHTML = '<option value="-1"> Seçiniz </option>';
    road.innerHTML = '<option value="-1"> Seçiniz </option>';
    street.innerHTML = '<option value="-1"> Seçiniz </option>';
  }
}

town.onchange = function (e) {
  const key = parseInt(this[this.selectedIndex].dataset.key);
  if (key) {
    neigborhood.innerText = '';
    road.innerText = '';
    street.innerText = '';

    neigborhood.innerHTML = '<option value="-1"> Seçiniz </option>';
    neigborhoods(key);
  } else {
    neigborhood.innerHTML = '<option value="-1"> Seçiniz </option>';
    road.innerHTML = '<option value="-1"> Seçiniz </option>';
    street.innerHTML = '<option value="-1"> Seçiniz </option>';
  }
}

neigborhood.onchange = function (e) {
  const key = parseInt(this[this.selectedIndex].dataset.key);
  if (!isNaN(key)) {
    road.innerText = '';
    street.innerText = '';

    road.innerHTML = '<option value="-1"> Seçiniz </option>';
    street.innerHTML = '<option value="-1"> Seçiniz </option>';
    roadstreets(key);
  }
  else {
    road.innerHTML = '<option value="-1"> Seçiniz </option>';
    street.innerHTML = '<option value="-1"> Seçiniz </option>';
  }

}

/***
 * 
 * Show Add Box after clicked button
 * 
 */
cityButton.onclick = function () {
  if (addCityBox.hidden)
    addCityBox.hidden = false;
  else
    addCityBox.hidden = true;
}

townButton.onclick = function () {
  if (addTownBox.hidden)
    addTownBox.hidden = false;
  else
    addTownBox.hidden = true;
}

neigborhoodButton.onclick = function () {
  if (addNeigborhoodBox.hidden)
    addNeigborhoodBox.hidden = false;
  else
    addNeigborhoodBox.hidden = true;
}

roadButton.onclick = function () {
  if (addRoadBox.hidden)
    addRoadBox.hidden = false;
  else
    addRoadBox.hidden = true;
}

streetButton.onclick = function () {
  if (addStreetBox.hidden)
    addStreetBox.hidden = false;
  else
    addStreetBox.hidden = true;
}

saveCityButton.onclick = function () {
  if (isEmpty(newCity)) {
    swal("Eksik Bilgi", "Bir İl İsmi Girmelisiniz", "error");
    return;
  }
  addCity(newCity.value);
}

saveTownButton.onclick = function () {
  if (isEmpty(city)) {
    swal("Hata", "Önce Bir Şehir Seçmelisiniz", "error");
    return;
  }

  const title = newTown.value,
    key = city[city.selectedIndex].dataset.key;

  if (isEmpty(newTown)) {
    swal("Eksik Bilgi", "Bir İlçe İsmi Girmelisiniz", "error");
    return;
  }
  addTown(title, key);
}

saveNeigborhoodButton.onclick = function () {

  if (isEmpty(town)) {
    swal("Hata", "Önce Bir İlçe Seçmelisiniz", "error");
    return;
  }

  const title = newNeigborhood.value,
    key = town[town.selectedIndex].dataset.key;

  if (isEmpty(newNeigborhood)) {
    swal("Eksik Bilgi", "Bir Mahalle İsmi Girmelisiniz", "error");
    return;
  }

  addNeigborhood(title, key);
}

saveRoadButton.onclick = function () {
  if (isEmpty(neigborhood)) {
    swal("Hata", "Önce Bir Mahalle Seçmelisiniz", "error");
    return;
  }

  if (isEmpty(newRoad)) {
    swal("Eksik Bilgi", "Bir Cadde İsmi Girmelisiniz", "error");
    return;
  }

  const title = newRoad.value,
    key = neigborhood[neigborhood.selectedIndex].dataset.key;

  addRoad(title, key);
}

saveStreetButton.onclick = function () {
  if (isEmpty(neigborhood)) {
    swal("Hata", "Önce Bir Mahalle Seçmelisiniz", "error");
    return;
  }

  if (isEmpty(newStreet)) {
    swal("Eksik Bilgi", "Bir Sokak İsmi Girmelisiniz", "error");
    return;
  }

  const title = newStreet.value,
    key = neigborhood[neigborhood.selectedIndex].dataset.key;

  addStreet(title, key);
}

cities();

