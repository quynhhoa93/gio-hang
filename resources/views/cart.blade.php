@if(\Illuminate\Support\Facades\Session::has("Cart") != null)
<div class="select-items">
    <table>
        <tbody>

        @foreach(\Illuminate\Support\Facades\Session::get('Cart')->products as $item)
        <tr>
            <td class="si-pic"><img src="assets/img/products/{{$item['productInfo']->image}}" alt=""></td>
            <td class="si-text">
                <div class="product-selected">
                    <p>{{$item['productInfo']->price}} x {{$item['quantity']}}</p>
                    <h6>{{$item['productInfo']->name}} </h6>
                </div>
            </td>
            <td class="si-close">
                <i class="ti-close" data-id="{{$item['productInfo']->id}}"></i>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{number_format(\Illuminate\Support\Facades\Session::get('Cart')->totalPrice)}}</h5>
    <input hidden id="total-quantity-cart" type="number" value="{{\Illuminate\Support\Facades\Session::get('Cart')->totalQuantity}}">
</div>
<div class="select-button">
    <a href="{{url('/list-cart')}}" class="primary-btn view-card">VIEW CARD</a>
    <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
</div>
@endif