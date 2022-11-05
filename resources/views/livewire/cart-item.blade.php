<tr wire:loading.class.delay="loading">
    <td>
        <h4>
            <a href="{{ $product->getFirstMediaUrl('image') }}">
                <img src="{{ $product->getFirstMediaUrl('image')}}"
                     alt="{{ $cartItem->name }}"
                     class="img-responsive img-thumbnail img-circle"
                     style="height: 50px ;width: 50px;object-fit: cover">
            </a>
        </h4>
    </td>
    <td>
        {{ $cartItem->name }}
    </td>
   <td>
        <p>
            {{ number_format($cartItem->price) }}
            <small>Rwf</small>
        </p>
    </td>
    <td>
        <form class="form-inline"
              action="{{ route('cart.increment',['id'=>$cartItem->id]) }}">

            <div class="input-group">
                <input wire:model.defer="quantity" type="text" class="form-control" name="qty"
                       placeholder="Quantity" min="1" wire:loading.attr="disabled" style="width: 70px;"
                       value="">
                <span class="input-group-btn">
                <button
                        wire:loading.attr="disabled"
                        class="btn btn-info btn-cart text-capitalize"
                        title="Click here to update Quantity."
                       wire:click="update"
                        data-toggle="tooltip" data-placement="right"
                        type="submit">
                    <i class="fa fa-plus"></i>
                </button>
              </span>
            </div>
        </form>

    </td>

     <td>
        <p>
             {{ number_format($cartItem->price * $cartItem->quantity ) }}
            <small>Rwf</small>
        </p>
    </td>

    <td>
        <button class="cart-remove-btn btn-xs btn-danger btn" wire:loading.attr="disabled"
                title="Click here to remove Item." wire:click="remove"
                data-toggle="tooltip" data-placement="left">
            <i class="fa fa-times"></i> Remove
        </button>
    </td>
</tr>

