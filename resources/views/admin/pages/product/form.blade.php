<form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="form-group row align-items-center">
        <label class="col-3">Tên</label>
        <div class="col">
            <input type="text" placeholder="Tên sản phẩm"  value="{{ $product->name ?? "" }}" name="name" class="form-control" >
            @if ($errors->first('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-3">Price</label>
        <div class="col">
            <input type="number" placeholder="0"  value="{{ $product->price ?? 0 }}" name="price" class="form-control" >
            @if ($errors->first('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-3">Danh mục</label>
        <div class="col">
            <select name="category_id" class="form-control" id="">
                @foreach($categories ?? [] as $item)
                    <option {{ ($product->category_id ?? 0) == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-3">Mô tả</label>
        <div class="col">
            <textarea name="content" class="form-control" id="" cols="30" rows="3" placeholder="Nội dung">{{ $product->content ?? "" }}</textarea>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-3">Avatar</label>
        <div class="col">
            <input type="file" name="avatar" class="form-control">
        </div>
    </div>
    @if (isset($product) && $product->avatar)
        <div class="form-group row align-items-center">
            <label class="col-3"></label>
            <div class="col">
                <img style="width: 100px;height: auto" src="{{ pare_url_file($product->avatar) }}" alt="">
            </div>
        </div>
    @endif
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    </div>
</form>
