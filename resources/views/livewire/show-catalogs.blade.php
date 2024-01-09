<div class="row justify-content-start">
    @foreach($catalogs as $catalog)
    <div class="col-3 text-center item-card bg-white">
        <div class="bg-secondary p-2">
            <div class="d-flex">
                <div class="me-auto"><i data-feather="heart"></i></div>
                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
            </div>
            <img src="{{ asset( 'storage/'.$catalog->banner ) }}" class="mx-auto mb-3"
                 style="width:150px;height:150px;" alt="" srcset="">
        </div>
        <div class="p-2">
            <p class="text-primary m-0 marcellus">{{ $catalog->title }}</p>
            <small class="text-primary inter fw-lighter">Women | Earrings</small>
            <br><br>
            <div class="d-flex marcellus">
                <div class="me-auto text-primary">₹ {{ $catalog->price }}</div>
                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
            </div>
        </div>
    </div>
    @endforeach
</div>
