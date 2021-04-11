<div class="header-search-bar layout-01">
    <form action="{{ route('single-products.index') }}" class="form-search" name="desktop-seacrh" method="get">
        <input type="text" id="name" name="name" class="input-text" value="" placeholder="Search here...">
        <select  name="categories_id">
            <option value="" selected>All Categories</option>
            @foreach($cates as $cate)
                <option
                    value="{{ $cate->id }}">{{ $cate->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
    </form>
</div>
