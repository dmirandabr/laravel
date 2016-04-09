<span v-for="product in products" v-cloak>
    <div class="rate-row" v-for="result in product">
        <div class="col-1">
            <img v-if="result.logo" v-bind:src="'http://www.brimg.net/system/img/inst/' + result.logo" />
            <div v-else>@{{ result.advertiser }}</div>
            <span v-show="result.ispaid == 'true'">
                <div class="reviews-stars"></div>
                <a href="@{{ result.adrefurl }}">Lender info</a>
                <div class="clearfix"></div>
                <span>State Lic # @{{ result.slicense }}</span><br>
                <span>NMLS # @{{ result.nmls }}</span>
            </span>
        </div>
        <div class="col-2">
            <div class="product-name">@{{ result.product | extractProductName }}</div>
            <div class="apr"><i>@{{ result.apr }}%</i> <span>APR</span></div>
            <div class="rate">@{{ result.rate }}% Rate | At @{{ result.originationpoints }} pts</div>
        </div>
        <div class="col-3">
            <div class="fees">$@{{ result.fees }} Fees</div>
            <div class="payment"><i>@{{ result.estpayment | currencyDisplay }}</i><span>/mo</span></div>
            <div class="date">As of: @{{ result.svydate | formatDate }}</div>
        </div>
        <div class="col-4" v-show="result.ispaid == 'true'">
            <a href="@{{ result.adrefurl }}" class="next">Next</a>
            <div class="clearfix"></div>
            <div class="phone" v-show="result.phone">@{{ result.phone }}</div>
        </div>
    </div>
</span>