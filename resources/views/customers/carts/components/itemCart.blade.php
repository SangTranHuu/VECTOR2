@foreach ($cartContent as $key => $product)
	<li class="item even">
	    <a class="product-image" href="#" title="Downloadable Product ">{!! Html::image($product['image'], null, ['width' => 80], null) !!}
	    <div class="detail-item">
	        <div class="product-details">
	            <a href="{{ action('Customer\CartController@edit', ['id' => $key]) }}" title="Remove This Item" class="glyphicon glyphicon-remove">&nbsp;</a>
	            <p class="product-name"> <a href="#" title="Downloadable Product">{{ $product['name'] }}</a> </p>
	        </div>
	        <div class="product-details-bottom"> <span class="price">{{ '$' . $product['price'] }}</span> <span class="title-desc">Qty:</span> <strong>{{ $product['qty'] }}</strong> </div>
	    </div>
	</li>
@endforeach