<div class="cart-table">
    <table>
        <thead>
        <tr>
            <th>Image</th>
            <th class="p-name">Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>save</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(\Illuminate\Support\Facades\Session::has('Cart') != null)
        @foreach(\Illuminate\Support\Facades\Session::get('Cart')->products as $item)
        <tr>
            <td class="cart-pic"><img src="assets/img/products/{{$item['productInfo']->image}}" alt=""></td>
            <td class="cart-title">
                <h5>{{$item['productInfo']->name}}</h5>
            </td>
            <td class="p-price">{{$item['productInfo']->price}}</td>
            <td class="qua-col">
                <div class="quantity">
                    <div class="pro-qty">
                        <input id="quantity-item-{{$item['productInfo']->id}}" type="text" value="{{$item['quantity']}}">
                    </div>
                </div>
            </td>
            <td class="total-price">{{$item['price']}}</td>
            <td class="close-td"><i class="ti-save" onclick="SaveListItemCart({{$item['productInfo']->id}});"></i></td>
            <td class="close-td"><i class="ti-close" onclick="DeleteListItemCart({{$item['productInfo']->id}});"></i></td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-lg-4 offset-lg-8">
        <div class="proceed-checkout">
            <ul>
                <li class="subtotal">Subtotal <span>{{\Illuminate\Support\Facades\Session::get('Cart')->totalQuantity}}</span></li>
                <li class="cart-total">Total <span>{{\Illuminate\Support\Facades\Session::get('Cart')->totalPrice}}</span></li>
            </ul>
            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
        </div>
    </div>
</div>