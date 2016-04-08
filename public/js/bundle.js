(function($) {

    var mortgageRateTable = new Vue({
        el: 'body',
        data: {
            products: {}
        },
        ready: function () {
            this.retrieveRates();
        },
        methods: {
            retrieveRates: function() {
                $.getJSON(BASE_URL + "/mortgage/rates", $('#mortgage-search-form').serialize(), function(data){
                    mortgageRateTable.products = data.response.products;
                });
            }
        },
        filters: {
            formatDate: function(value) {
                return moment(value).format('DD/MM');
            },
            extractProductName: function(value) {
                var commaPos = value.indexOf(",");
                return commaPos > 0 ? value.substr(0, commaPos) : value;
            }
        }

    });

    $(document).ready(function() {

        $('#search-btn').click(function() {
            mortgageRateTable.retrieveRates();
        });

    });

}(jQuery));