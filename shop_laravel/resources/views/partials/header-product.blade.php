
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #b1b5b9">
    <form class="form-inline" method="get" action="{{ route('product.search') }}">

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập ID </label>
            <input type="text" class="form-control" name="product_id"
                   value="{{ request()->product_id }}"
                   placeholder="Nhập Id">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập tên sản phẩm </label>
            <input type="text"
                   value="{{ request()->name }}"
                   class="form-control" placeholder="Nhập tên sản phẩm" name="name">
        </div>

        <div class="form-group mx-sm-2 mb-2">
            <label class="sr-only"> Nhập tags sản phẩm </label>
            <input type="text"
                   value="{{ request()->tags }}"
                   class="form-control" placeholder="Nhập tags sản phẩm" name="tags">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</nav>
<!-- /.navbar -->
