<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- DataTable -->
<script type="text/javascript">
    new DataTable('#dataTable');
</script>

@php
    $currentRouteName = Route::currentRouteName();
@endphp

@if ($currentRouteName === 'dashboard-pos')
    <!-- Point of Sales -->
    <script>
        $('#add').click(function() {
            $("#item").append(`
            <div class="row g-3 mb-3">
                <div class="col-md-6 col-6 me-3">
                    <select name="id_produk[]" id="largeSelect" class="form-select form-select-lg" required>
                        <option value=""> -- Pilh Produk -- </option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id_produk }}" @selected(old('id_produk') == $produk->id_produk)>
                                {{ $produk->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-3 me-3">
                    <div class="form-floating form-floating-outline">
                        <input name="quantity[]" value="{{ old('quantity') }}" type="number" class="form-control"
                            id="floatingInput" placeholder="100" aria-describedby="floatingInputHelp"
                            required />
                        <label for="floatingInput">Quantity</label>
                    </div>
                </div>
                <div class="col-md-2 col-3">
                    <button class="btn btn-danger remove">Remove</button>
                </div>
            </div>
        `);
        });

        $(document).on('click', '.remove', function(e) {
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    </script>
@endif

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
