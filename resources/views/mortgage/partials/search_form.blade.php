<form id="mortgage-search-form" method="get">
    <div class="form-group">
        <label>Location</label>
        <select name="market" class="form-control">
            <option value="98" data-zipcode="33409">West Palm Beach, FL</option>
            <option value="4" data-zipcode="90001" selected>Los Angeles, CA</option>
            <option value="2" data-zipcode="10001">New York, NY</option>
        </select>
    </div>
    <div class="form-group">
        <label for="product-type">Type</label>
        <select id="product-type" class="form-control">
            <option value="refinance" selected="">Refinance</option>
            <option value="newmortgage">Purchase</option>
        </select>
    </div>
    <div class="form-group br-loan">
        <label for="loan">Loan</label>
        <input type="text" id="loan" class="form-control" value="$290,000">
        <input type="hidden" name="loan" value="290000">
    </div>
    <div class="form-group">
        <label for="perc">Percentage down</label>
        <select name="perc" class="form-control">
            <option value="5">5% down</option>
            <option value="10">10% down</option>
            <option value="15">15% down</option>
            <option value="20" selected>20% down</option>
            <option value="25">25% down</option>
            <option value="30">30% down</option>
            <option value="40">40% down</option>
        </select>
    </div>
    <div class="form-group">
        <label for="prods">Product</label>
        <select name="prods" class="form-control">
            <option value="215">15 year fixed refi</option>
            <option value="216" selected>30 year fixed refi</option>
            <option value="219">5/1 ARM refi</option>
            <option value="220">7/1 ARM refi</option>
            <option value="221">10/1 ARM refi</option>
            <option value="392">20 year fixed refi</option>
            <option value="393">10 year fixed refi</option>
            <option value="450">30 year VA mortgage refi</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fico">Credit Score</label>
        <select name="fico" class="form-control">
            <option value="670">Credit score 660 - 679</option>
            <option value="690">Credit score 680 - 699</option>
            <option value="710">Credit score 700 - 719</option>
            <option value="730">Credit score 720 - 739</option>
            <option value="740" selected>Credit score 740+</option>
        </select>
    </div>
    <div class="form-group">
        <label for="points">Points</label>
        <select name="points" class="form-control">
            <option value="Zero" data-val="0" selected>0 pts</option>
            <option value="ZeroToOne" data-val="1">0.1 - 1.0 pts</option>
            <option value="OneToTwo" data-val="2">1.01 - 2.0 pts</option>
            <option value="All" data-val="3">All points</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" id="search-btn">Update Rates</button>
</form>