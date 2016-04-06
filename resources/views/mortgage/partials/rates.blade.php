@for($i = 1; $i <= 5; $i++)
<div class="rate-row">
    <div class="col-1">
        <img src="{{ asset('img/1739_logo.gif') }}">
        <div class="reviews-stars"></div>
        <a href="#">Lender info</a>
        <div class="clearfix"></div>
        <span>NMLS # 472433</span>
    </div>
    <div class="col-2">
        <div class="product-name">30 yr fixed refi</div>
        <div class="apr">3.625% <span>APR</span></div>
        <div class="rate">3.625% Rate | At 0 pts</div>
    </div>
    <div class="col-3">
        <div class="fees">$0.00 Fees</div>
        <div class="payment">$958<span>/mo</span></div>
        <div class="date">As of: 02/05</div>
    </div>
    <div class="col-4">
        <a href="#" class="next">Next</a>
        <div class="clearfix"></div>
        <div class="phone">(877) 345-9683</div>
    </div>
</div>
@endfor