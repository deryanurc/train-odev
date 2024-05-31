document.addEventListener('DOMContentLoaded', function() {
   
    const fromInput = document.getElementById('from');
    const fromSuggestions = document.getElementById('from-suggestions');
    const toInput = document.getElementById('to');
    const toSuggestions = document.getElementById('to-suggestions');


    fetch('cities.json')
        .then(response => response.json())
        .then(cities => {
            const setupAutocomplete = (input, suggestions) => {
                input.addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    suggestions.innerHTML = '';
                    if (query.length > 0) {
                        const filteredCities = cities.filter(city => city.toLowerCase().includes(query));
                        filteredCities.forEach(city => {
                            const suggestion = document.createElement('div');
                            suggestion.className = 'autocomplete-suggestion';
                            suggestion.textContent = city;
                            suggestion.addEventListener('click', function() {
                                input.value = city;
                                suggestions.innerHTML = '';
                            });
                            suggestions.appendChild(suggestion);
                        });
                    }
                });
            };

            setupAutocomplete(fromInput, fromSuggestions);
            setupAutocomplete(toInput, toSuggestions);
        });
});
