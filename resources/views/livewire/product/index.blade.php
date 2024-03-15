@section('title')
    Produk
@endsection

<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Produk List</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                <button wire:click="$toggle('formVisible')" class="btn btn-primary btn-sm">Create</button>
            </div>
            @if ($formVisible)
                @if (!$formUpdate)
                    @livewire('product.create')
                @else
                    @livewire('product.update')
                @endif
            @endif
        </div>

        <div class="card">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show" id="successMessage">
                        <div class="text-white">{{ session('message') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row flex justify-content-between">
                    <div class="col-md-2 col-sm-6">
                        <select wire:model.live="paginate" name="" id=""
                            class="form-control form-control-sm w-auto"><i class="bx bx-down-arrow-alt"></i>
                            <option value="5">5 <i class="bx bx-down-arrow-alt"></i></option>
                            <option value="10">10 <i class="bx bx-down-arrow-alt"></i></option>
                            <option value="20">20 <i class="bx bx-down-arrow-alt"></i></option>
                            <option value="50">50 <i class="bx bx-down-arrow-alt"></i></option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <input type="text" class="form-control form-control-sm" wire:model.live="search"
                            placeholder="Search">
                    </div>
                </div>

                <hr>
                <table class="table mb-0 table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($products as $item)
                            <tr>
                                <th style="width: 2%" scope="row">{{ $no++ }}</th>
                                <td>{{ $item->title }}</td>
                                <td>Rp. {{ number_format($item->harga, 2, ',', '.') }}</td>
                                <td>
                                    <button wire:click="editProduct({{ $item->id }})"
                                        class="btn btn-info btn-sm text-white"><i class="bx bx-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm text-white"><i
                                            class="bx bxs-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
