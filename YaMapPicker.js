/* YA MAPS  FUNCTIONS */
var yamap;
var initDot;
var initZoom = 14;

ymaps.ready(initMapCallback);


function initMapCallback() {
    yamap = new ymaps.Map ("YMap", {
        center: [55.321608,42.166761],
        zoom: 14
    });

    yamap.controls.add('mapTools');
    yamap.controls.add('zoomControl');

    // регистрируем событие - если в DOM есть координаты
    // услование для редактирования
    if ($('#yaMapLat').size()>0 && $('#yaMapLong').size()>0 ) {
        var x_coords = $('#yaMapLat').val();
        var y_coords = $('#yaMapLong').val();

        // если координаты уже есть.. ставим метку + центрируем карту
        if (x_coords>0 && y_coords>0) {
            setInitDot([y_coords,x_coords]);
            yamap.setCenter([y_coords,x_coords]);
        }

        yamap.events.add('click', function (e) {
            var coords = e.get('coordPosition');
            setInitDot(coords);
        });
    }
}

function setInitDot(coords) {
    if (initDot != undefined) {
        yamap.geoObjects.remove(initDot);
    }

    $('#yaMapLong').val(coords[0]);
    $('#yaMapLat').val(coords[1]);
    $('#yaMapZoom').val(yamap.getZoom());

    initDot = new ymaps.Placemark(coords,{},{draggable: true});
    yamap.geoObjects.add(initDot);

    initDot.events.add('dragend', function(e) {
        // Получение ссылки на объект, который был передвинут.
        var thisPlacemark = e.get('target');
        // Определение координат метки
        var coords = thisPlacemark.geometry.getCoordinates();

        // set vars to
        $('#yaMapLong').val(coords[0]);
        $('#yaMapLat').val(coords[1]);
        $('#yaMapZoom').val(yamap.getZoom());

    });
}