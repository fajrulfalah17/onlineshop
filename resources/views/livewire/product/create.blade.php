@section('title')
    Produk
@endsection

<div class="row">
    <div class="col-xl-12 mx-auto mb-4">
        {{-- <h6 class="mb-0 text-uppercase">Produk Create</h6>
        <hr /> --}}
        <div class="container">
            {{-- <div class="card-body"> --}}
            <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input wire:model="title" type="text"
                            class="form-control @error('title')
                            is-invalid
                        @enderror">
                        @error('title')
                            <span class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga</label>
                        <input wire:model="harga" type="text"
                            class="form-control @error('harga')
                        is-invalid
                    @enderror">
                        @error('harga')
                            <span class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input wire:model="deskripsi" type="text"
                            placeholder="Deskripsi"class="form-control @error('deskripsi')
                        is-invalid
                    @enderror">
                        @error('deskripsi')
                            <span class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col mb-3">
                        <label for="image">Foto Produk</label>
                        <input wire:model="image" type="file" id="image"
                            class="form-control @error('image')
                        is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </span>
                        @enderror
                        @if ($image)
                            <img class="mt-2" src="{{ $image->temporaryUrl() }}" alt="" height="200">
                        @endif
                    </div>
                </div>
                <div class="float-right" role="group" aria-label="Button Form">
                    <button type="submit" class="btn btn-sm btn-primary btn-flat">Submit</button>
                    <button wire:click="closeForm" type="button"
                        class="btn btn-sm btn-secondary btn-flat">Close</button>
                </div>
            </form>
            {{-- </div> --}}
        </div>
    </div>
</div>
