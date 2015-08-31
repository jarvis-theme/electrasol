<div id="shopping-cart" class="shop-menu">
	<a href="{{url('checkout')}}"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;<span>{{ Shpcart::cart()->total_items() }}&nbsp;</span>items&nbsp;&nbsp;<span class="price-chart">{{-- price(Shpcart::cart()->total() )--}}</span></a>
</div>