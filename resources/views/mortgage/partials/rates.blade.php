<span v-for="product in products" v-cloak>
    <div class="rate-row" v-for="result in product.results">
        <div class="col-1">
            <img v-if="result.img" v-bind:src="'http://www.brimg.net/' + result.img" />
            <span v-else>@{{ result.lender }}</span>
            <div class="reviews-stars"></div>
            <a href="@{{ result.url }}">Lender info</a>
            <div class="clearfix"></div>
            <span>NMLS # @{{ result.nmls }}</span>
        </div>
        <div class="col-2">
            <div class="product-name">@{{ result.description | extractProductName }}</div>
            <div class="apr"><i>@{{ result.apr }}%</i> <span>APR</span></div>
            <div class="rate">@{{ result.rate }}% Rate | At @{{ result.points }} pts</div>
        </div>
        <div class="col-3">
            <div class="fees">$@{{ result.fees }} Fees</div>
            <div class="payment"><i>$@{{ result.payment }}</i><span>/mo</span></div>
            <div class="date">As of: @{{ result.date | formatDate }}</div>
        </div>
        <div class="col-4">
            <a href="#" class="next">Next</a>
            <div class="clearfix"></div>
            <div class="phone">@{{ result.phone }}</div>
        </div>
    </div>
</span>