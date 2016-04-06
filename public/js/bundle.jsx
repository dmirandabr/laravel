(function($, React, undefined){

    var RateRow = React.createClass({
        fixProductName: function(name) {
            name = name.replace('mtg', '');
            return name.replace('yr', 'year');
        },
        render: function() {
            return (
                <tr>
                    <td>{this.fixProductName(this.props.rate.productdescription)}</td>
                    <td>{(this.props.rate.ratevalue*1).toFixed(2)}%</td>
                    <td>{(this.props.rate.ratevalue-this.props.rate.ratelastweek).toFixed(2)}</td>
                    <td>{(this.props.rate.ratelastweek*1).toFixed(2)}%</td>
                </tr>
            );
        }
    });

    var OAMortgage = React.createClass({
        getInitialState: function() {
            return {
                products: [1, 2, 6],
                marketId: 4,
                results: []
            };
        },
        componentWillMount: function() {
            var component = this;
            $.getJSON(BASE_URL + "/oa/mortgage/" + this.state.products.join(',') + "/" + this.state.marketId, function(response){
                if (typeof response.results != 'undefined') {
                    component.setState({'results' : response.results});
                }
            });
        },
        render: function() {
            return (
                <table className="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Rate</th>
                        <th>Change</th>
                        <th>Last Week</th>
                    </tr>
                    </thead>
                    <tbody>
                        {this.state.results.map(function(rate) {
                            return (<RateRow rate={rate} />)
                        })}
                    </tbody>
                </table>
            );
        }
    });

    if ($('#mortgage-oa-rates').length > 0) {
        ReactDOM.render(<OAMortgage />, document.getElementById('mortgage-oa-rates'));
    }

})(jQuery, React);

(function($, React, undefined){

    var RateTableRow = React.createClass({
        fixProductName: function(name) {
            name = name.replace('mtg', '');
            return name.replace('yr', 'year');
        },
        extractProductName: function (name) {
            var commaPos = name.indexOf(",");
            if (commaPos > 0) {
                return name.substr(0, commaPos);
            }
            return name;
        },
        render: function() {
            var nextButton, lenderInfo;

            if (this.props.result.listingType == 'paid') {
                lenderInfo = (
                    <div className="col-1">
                        {(() => {
                            if (typeof this.props.result.img != 'undefined') {
                                return <img src={"http://www.brimg.net/" + this.props.result.img}/>
                            } else {
                                return this.props.result.lender;
                            }
                        })()}
                        <div className="reviews-stars"></div>
                        <a href="{this.props.result.url}">Lender info</a>
                        <div className="clearfix"></div>
                        <span>NMLS # {this.props.result.nmls}</span>
                    </div>
                );
                nextButton = (<div className="col-4">
                    <a href="#" className="next">Next</a>
                    <div className="clearfix"></div>
                    <div className="phone">{this.props.result.phone}</div>
                </div>);
            } else {
                lenderInfo = (
                    <div className="col-1">
                        {this.props.result.lender}
                    </div>
                );
            }

            return (
                <div className="rate-row">
                    {lenderInfo}
                    <div className="col-2">
                        <div className="product-name">{this.extractProductName(this.props.result.description)}</div>
                        <div className="apr"><i>{this.props.result.apr}%</i> <span>APR</span></div>
                        <div className="rate">{this.props.result.rate}% Rate | At {this.props.result.points} pts</div>
                    </div>
                    <div className="col-3">
                        <div className="fees">${this.props.result.fees} Fees</div>
                        <div className="payment"><i>${this.props.result.payment}</i><span>/mo</span></div>
                        <div className="date">As of: {moment(this.props.result.date).format('DD/MM')}</div>
                    </div>
                    {nextButton}
                </div>
            );
        }
    });

    var RateTableMortgage = React.createClass({
        getInitialState: function() {
            return {
                results: []
            };
        },
        componentWillMount: function() {
            this.requestRates();
        },
        requestRates : function() {
            var component = this;
            $.getJSON(BASE_URL + "/mortgage/rates", $('#mortgage-search-form').serialize(), function(data){
                var results = [];

                if (typeof data.response.products != 'undefined') {
                    data.response.products.forEach(function(product) {
                        product.results.forEach(function(result){
                            results.push(result);
                        });
                    });
                }

                component.setState({'results' : results});
                console.log('Products Loaded...!');
            });
        },
        render: function() {
            return (
                <span>
                    {this.state.results.map(function(result) {
                        return (<RateTableRow result={result} />)
                    })}
                </span>
            );
        }
    });

    if ($('#mortgage-rate-tables').length > 0) {
        var MortgageRateTableIns = ReactDOM.render(<RateTableMortgage />, document.getElementById('mortgage-rate-tables'));

        $('#search-btn').click(function() {
            MortgageRateTableIns.requestRates();
        });
    }

})(jQuery, React);
