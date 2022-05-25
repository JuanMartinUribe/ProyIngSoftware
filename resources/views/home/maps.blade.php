<head>
    <title>Locator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/handlebars/4.7.7/handlebars.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }



        #map-container {
            width: 100%;
            height: 100%;
            position: relative;
            font-family: "Roboto", sans-serif;
            box-sizing: border-box;
        }



        #map-container button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            font-size: inherit;
            cursor: pointer;
        }



        #gmp-map {
            position: absolute;
            left: 22em;
            top: 0;
            right: 0;
            bottom: 0;
        }



        #locations-panel {
            position: absolute;
            left: 0;
            width: 22em;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            background: white;
            padding: 0.5em;
            box-sizing: border-box;
        }



        @media only screen and (max-width: 876px) {
            #gmp-map {
                left: 0;
                bottom: 50%;
            }



            #locations-panel {
                top: 50%;
                right: 0;
                width: unset;
            }
        }



        #locations-panel-list>header {
            padding: 1.4em 1.4em 0 1.4em;
        }



        #locations-panel-list h1.search-title {
            font-size: 1em;
            font-weight: 500;
            margin: 0;
        }



        #locations-panel-list h1.search-title>img {
            vertical-align: bottom;
            margin-top: -1em;
        }



        #locations-panel-list .search-input {
            width: 100%;
            margin-top: 0.8em;
            position: relative;
        }



        #locations-panel-list .search-input input {
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 0.3em;
            height: 2.2em;
            box-sizing: border-box;
            padding: 0 2.5em 0 1em;
            font-size: 1em;
        }



        #locations-panel-list .search-input-overlay {
            position: absolute;
        }



        #locations-panel-list .search-input-overlay.search {
            right: 2px;
            top: 2px;
            bottom: 2px;
            width: 2.4em;
        }



        #locations-panel-list .search-input-overlay.search button {
            width: 100%;
            height: 100%;
            border-radius: 0.2em;
            color: black;
            background: transparent;
        }



        #locations-panel-list .search-input-overlay.search .icon {
            margin-top: 0.05em;
            vertical-align: top;
        }



        #locations-panel-list .section-name {
            font-weight: 500;
            font-size: 0.9em;
            margin: 1.8em 0 1em 1.5em;
        }



        #locations-panel-list .location-result {
            position: relative;
            padding: 0.8em 3.5em 0.8em 1.4em;
            border-bottom: 1px solid rgba(0, 0, 0, 0.12);
            cursor: pointer;
        }



        #locations-panel-list .location-result:first-of-type {
            border-top: 1px solid rgba(0, 0, 0, 0.12);
        }



        #locations-panel-list .location-result:last-of-type {
            border-bottom: none;
        }



        #locations-panel-list .location-result.selected {
            outline: 2px solid #4285f4;
        }



        #locations-panel-list button.select-location {
            margin-bottom: 0.6em;
            text-align: left;
        }



        #locations-panel-list .location-result h2.name {
            font-size: 1em;
            font-weight: 500;
            margin: 0;
        }



        #locations-panel-list .location-result .address {
            font-size: 0.9em;
            margin-bottom: 0.5em;
        }



        #location-results-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    </style>
    <script>
        'use strict';



        /**
         * Defines an instance of the Locator+ solution, to be instantiated
         * when the Maps library is loaded.
         */
        function LocatorPlus(configuration) {
            const locator = this;



            locator.locations = configuration.locations || [];
            locator.capabilities = configuration.capabilities || {};



            const mapEl = document.getElementById('gmp-map');
            const panelEl = document.getElementById('locations-panel');
            locator.panelListEl = document.getElementById('locations-panel-list');
            const sectionNameEl =
                document.getElementById('location-results-section-name');
            const resultsContainerEl = document.getElementById('location-results-list');



            const itemsTemplate = Handlebars.compile(
                document.getElementById('locator-result-items-tmpl').innerHTML);



            locator.searchLocation = null;
            locator.searchLocationMarker = null;
            locator.selectedLocationIdx = null;
            locator.userCountry = null;



            // Initialize the map -------------------------------------------------------
            locator.map = new google.maps.Map(mapEl, configuration.mapOptions);



            // Store selection.
            const selectResultItem = function(locationIdx, panToMarker, scrollToResult) {
                locator.selectedLocationIdx = locationIdx;
                for (let locationElem of resultsContainerEl.children) {
                    locationElem.classList.remove('selected');
                    if (getResultIndex(locationElem) === locator.selectedLocationIdx) {
                        locationElem.classList.add('selected');
                        if (scrollToResult) {
                            panelEl.scrollTop = locationElem.offsetTop;
                        }
                    }
                }
                if (panToMarker && (locationIdx != null)) {
                    locator.map.panTo(locator.locations[locationIdx].coords);
                }
            };



            // Create a marker for each location.
            const markers = locator.locations.map(function(location, index) {
                const marker = new google.maps.Marker({
                    position: location.coords,
                    map: locator.map,
                    title: location.title,
                });
                marker.addListener('click', function() {
                    selectResultItem(index, false, true);
                });
                return marker;
            });



            // Fit map to marker bounds.
            locator.updateBounds = function() {
                const bounds = new google.maps.LatLngBounds();
                if (locator.searchLocationMarker) {
                    bounds.extend(locator.searchLocationMarker.getPosition());
                }
                for (let i = 0; i < markers.length; i++) {
                    bounds.extend(markers[i].getPosition());
                }
                locator.map.fitBounds(bounds);
            };
            if (locator.locations.length) {
                locator.updateBounds();
            }



            // Get the distance of a store location to the user's location,
            // used in sorting the list.
            const getLocationDistance = function(location) {
                if (!locator.searchLocation) return null;



                // Fall back to straight-line distance.
                return google.maps.geometry.spherical.computeDistanceBetween(
                    new google.maps.LatLng(location.coords),
                    locator.searchLocation.location);
            };



            // Render the results list --------------------------------------------------
            const getResultIndex = function(elem) {
                return parseInt(elem.getAttribute('data-location-index'));
            };



            locator.renderResultsList = function() {
                let locations = locator.locations.slice();
                for (let i = 0; i < locations.length; i++) {
                    locations[i].index = i;
                }
                if (locator.searchLocation) {
                    sectionNameEl.textContent =
                        'Nearest locations (' + locations.length + ')';
                    locations.sort(function(a, b) {
                        return getLocationDistance(a) - getLocationDistance(b);
                    });
                } else {
                    sectionNameEl.textContent = `All locations (${locations.length})`;
                }
                const resultItemContext = {
                    locations: locations
                };
                resultsContainerEl.innerHTML = itemsTemplate(resultItemContext);
                for (let item of resultsContainerEl.children) {
                    const resultIndex = getResultIndex(item);
                    if (resultIndex === locator.selectedLocationIdx) {
                        item.classList.add('selected');
                    }



                    const resultSelectionHandler = function() {
                        selectResultItem(resultIndex, true, false);
                    };



                    // Clicking anywhere on the item selects this location.
                    // Additionally, create a button element to make this behavior
                    // accessible under tab navigation.
                    item.addEventListener('click', resultSelectionHandler);
                    item.querySelector('.select-location')
                        .addEventListener('click', function(e) {
                            resultSelectionHandler();
                            e.stopPropagation();
                        });
                }
            };



            // Optional capability initialization --------------------------------------
            initializeSearchInput(locator);



            // Initial render of results -----------------------------------------------
            locator.renderResultsList();
        }



        /** When the search input capability is enabled, initialize it. */
        function initializeSearchInput(locator) {
            const geocodeCache = new Map();
            const geocoder = new google.maps.Geocoder();



            const searchInputEl = document.getElementById('location-search-input');
            const searchButtonEl = document.getElementById('location-search-button');



            const updateSearchLocation = function(address, location) {
                if (locator.searchLocationMarker) {
                    locator.searchLocationMarker.setMap(null);
                }
                if (!location) {
                    locator.searchLocation = null;
                    return;
                }
                locator.searchLocation = {
                    'address': address,
                    'location': location
                };
                locator.searchLocationMarker = new google.maps.Marker({
                    position: location,
                    map: locator.map,
                    title: 'My location',
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 12,
                        fillColor: '#3367D6',
                        fillOpacity: 0.5,
                        strokeOpacity: 0,
                    }
                });



                // Update the locator's idea of the user's country, used for units. Use
                // `formatted_address` instead of the more structured `address_components`
                // to avoid an additional billed call.
                const addressParts = address.split(' ');
                locator.userCountry = addressParts[addressParts.length - 1];



                // Update map bounds to include the new location marker.
                locator.updateBounds();



                // Update the result list so we can sort it by proximity.
                locator.renderResultsList();
            };



            const geocodeSearch = function(query) {
                if (!query) {
                    return;
                }



                const handleResult = function(geocodeResult) {
                    searchInputEl.value = geocodeResult.formatted_address;
                    updateSearchLocation(
                        geocodeResult.formatted_address, geocodeResult.geometry.location);
                };



                if (geocodeCache.has(query)) {
                    handleResult(geocodeCache.get(query));
                    return;
                }
                const request = {
                    address: query,
                    bounds: locator.map.getBounds()
                };
                geocoder.geocode(request, function(results, status) {
                    if (status === 'OK') {
                        if (results.length > 0) {
                            const result = results[0];
                            geocodeCache.set(query, result);
                            handleResult(result);
                        }
                    }
                });
            };



            // Set up geocoding on the search input.
            searchButtonEl.addEventListener('click', function() {
                geocodeSearch(searchInputEl.value.trim());
            });



            // Add in an event listener for the Enter key.
            searchInputEl.addEventListener('keypress', function(evt) {
                if (evt.key === 'Enter') {
                    geocodeSearch(searchInputEl.value);
                }
            });
        }
    </script>
    <script>
        const CONFIGURATION = {
            "locations": [{
                "title": "Cra. 49 Cl. 7 Sur #50",
                "address1": "Cra. 49 Cl. 7 Sur #50",
                "address2": "Medellín, El Poblado, Medellín, Antioquia, Colombia",
                "coords": {
                    "lat": 6.199720061605698,
                    "lng": -75.57921982341861
                },
                "placeId": "EkVDcmEuIDQzQiAjOC0xMSwgTWVkZWxsw61uLCBFbCBQb2JsYWRvLCBNZWRlbGzDrW4sIEFudGlvcXVpYSwgQ29sb21iaWEiUBJOCjQKMgkJcnT-KihEjhF7ikJNaFlbixoeCxDuwe6hARoUChIJf3kbIo-CRo4R-Ge6E_04LAEMEAsqFAoSCdGx7MMqKESOETepp-ZmS0TW"
            }],
            "mapOptions": {
                "center": {
                    "lat": 38.0,
                    "lng": -100.0
                },
                "fullscreenControl": true,
                "mapTypeControl": false,
                "streetViewControl": false,
                "zoom": 4,
                "zoomControl": true,
                "maxZoom": 17
            },
            "mapsApiKey": "AIzaSyBDjg7RHtt3RNeEJmgnquxZq34uyWUSaEQ",
            "capabilities": {
                "input": true,
                "autocomplete": false,
                "directions": false,
                "distanceMatrix": false,
                "details": false
            }
        };



        function initMap() {
            new LocatorPlus(CONFIGURATION);
        }
    </script>
    <script id="locator-result-items-tmpl" type="text/x-handlebars-template">
        <center> 
          <h1> 
              @lang('GG NO TEAM') 
            </h1>
        </center>
</script>
</head>

<body>
    <div id="map-container">
        <div id="locations-panel">
            <div id="locations-panel-list">
                <header>
                    <h1 class="search-title">
                        <img src="https://fonts.gstatic.com/s/i/googlematerialicons/place/v15/24px.svg" />
                        Find a location near you
                    </h1>
                    <div class="search-input">
                        <input id="location-search-input" placeholder="Enter your address or zip code">
                        <div id="search-overlay-search" class="search-input-overlay search">
                            <button id="location-search-button">
                                <img class="icon" src="https://fonts.gstatic.com/s/i/googlematerialicons/search/v11/24px.svg" alt="Search" />
                            </button>
                        </div>
                    </div>
                </header>
                <div class="section-name" id="location-results-section-name">
                    All locations
                </div>
                <div class="results">
                    <ul id="location-results-list"></ul>
                </div>
            </div>
        </div>
        <div id="gmp-map"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDjg7RHtt3RNeEJmgnquxZq34uyWUSaEQ&callback=initMap&libraries=places,geometry&solution_channel=GMP_QB_locatorplus_v4_cA" async defer></script>
</body>