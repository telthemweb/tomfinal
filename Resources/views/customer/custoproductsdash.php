<div class="container mt-lg-5">
    <div class="row justify-content-center mb-lg-5">
        <div class="col-md-6">
            <form action="<?php route('/cutomer/products/search'); ?>" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="searchp" id="searchp" placeholder="Search Product Name">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </div>
            </form>

        </div>

    </div>

    <div class="row mb-lg-5">
        <?php foreach ($products as $product) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="<?php route('/product/' . $product->id); ?>" class="p-2 card shadow rounded-0 text-reset text-decoration-none">
                    <div class="card">
                        <img src="<?php echo url($product->product_img == null ? "assets/uploads/products/MTY4MzgwMDI4ODQ2NzE=.jpg" : $product->product_img); ?>" alt="Product-image" class="img-fluid rounded-0">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->name; ?></h5>
                            <p class="p-2"><?php echo $product->description; ?></p>
                            <a href="<?php route('/product/' . $product->id); ?>" class="btn btn-primary"><?php echo "$" . format_num($product->price) . ".00"; ?></a>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>
</div>