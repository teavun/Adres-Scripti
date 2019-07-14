/**
 *  General Boxes
 * 
 */
const cityBox = document.getElementById('cityBox'),
    townBox = document.getElementById('townBox'),
    neigborhoodBox = document.getElementById('neigborhoodBox'),
    roadBox = document.getElementById('roadBox'),
    streetBox = document.getElementById('streetBox');

/**
*  Adding Boxes
* 
*/
const addCityBox = cityBox.lastElementChild,
    addTownBox = townBox.lastElementChild,
    addNeigborhoodBox = neigborhoodBox.lastElementChild,
    addRoadBox = roadBox.lastElementChild,
    addStreetBox = streetBox.lastElementChild;

/**
 * 
 * Selecting Boxes
 */
const selectCityBox = cityBox.firstElementChild,
    selectTownBox = townBox.firstElementChild,
    selectNeigborhoodBox = neigborhoodBox.firstElementChild,
    selectRoadBox = roadBox.firstElementChild,
    selectStreetBox = streetBox.firstElementChild;


/**
 * Select
 * 
 */
const city = document.getElementById('city'),
    town = document.getElementById('town'),
    neigborhood = document.getElementById('neigborhood'),
    road = document.getElementById('road'),
    street = document.getElementById('street');


/**
 * 
 * Buttons
 * 
 */
const cityButton = selectCityBox.lastElementChild,
    townButton = selectTownBox.lastElementChild,
    neigborhoodButton = selectNeigborhoodBox.lastElementChild,
    roadButton = selectRoadBox.lastElementChild,
    streetButton = selectStreetBox.lastElementChild;

/**
 * 
 * Save Buttons
 * 
 */
const saveCityButton = addCityBox.lastElementChild,
    saveTownButton = addTownBox.lastElementChild,
    saveNeigborhoodButton = addNeigborhoodBox.lastElementChild,
    saveRoadButton = addRoadBox.lastElementChild,
    saveStreetButton = addStreetBox.lastElementChild;

/**
 * 
 * new inputs
 */
const newCity = document.getElementById('newcity'),
    newTown = document.getElementById('newtown'),
    newNeigborhood = document.getElementById('newneigborhood'),
    newRoad = document.getElementById('newroad'),
    newStreet = document.getElementById('newstreet');


const sendButton = document.getElementById('sendButton');

var createOption = function (val, txt, key = null) {
    const opt = document.createElement('option');
    opt.value = val;
    opt.text = txt;
    if (key != null)
        opt.dataset.key = key;
    return opt;
}

let isEmpty = function (element) {
    const tag = element.tagName;

    if (tag == 'SELECT') {
        if (element[element.selectedIndex].value == -1)
            return true;
        return false;
    }
    else if (tag == 'INPUT') {
        if (element.value.length <= 0)
            return true;
        return false;
    }

}