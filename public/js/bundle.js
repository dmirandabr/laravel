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
            getUrlByZipCode: function() {
                return 'http://ps.bankrate.com/mortgage/' +
                    $('#mortgage-search-form [name="prods"]').val() + '/' +
                    $('#mortgage-search-form [name="market"] :selected').data('zipcode') + '/' +
                    $('#mortgage-search-form [name="loan"]').val() + '/' +
                    (100-$('#mortgage-search-form [name="perc"]').val()*1) + '/' +
                    $('#mortgage-search-form [name="fico"]').val() + '/' +
                    $('#mortgage-search-form [name="points"] :selected').data('val');
            },
            getUrlByMarketId: function() {
                return 'http://ps.bankrate.com/mortgage/market/' +
                    $('#mortgage-search-form [name="prods"]').val() + '/' +
                    $('#mortgage-search-form [name="market"]').val() + '/' +
                    $('#mortgage-search-form [name="loan"]').val() + '/' +
                    $('#mortgage-search-form [name="perc"]').val() + '/' +
                    $('#mortgage-search-form [name="fico"]').val() + '/' +
                    $('#mortgage-search-form [name="points"] :selected').data('val');
            },
            retrieveRates: function() {
                $.ajax({
                    url: this.getUrlByZipCode(),
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader(
                            'Authorization',
                            'Basic YnIzOjRjN3RkYnk4aWo3bA=='
                        )
                    }
                }).success(function (data) {
                    mortgageRateTable.products = data.products;
                }).error(function () {
                    alert('An error occurred!');
                });
            }
        },
        filters: {
            formatDate: function(value) {
                return moment(new Date(value)).format('DD/MM');
            },
            extractProductName: function(value) {
                var commaPos = value.indexOf(",");
                return commaPos > 0 ? value.substr(0, commaPos) : value;
            },
            currencyDisplay: function(val) {
                return '$' + (+val).toFixed(0);
            }
        }
    });

}(jQuery));