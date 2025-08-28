<?php 

template_include("/backend/partials/header");

?> 
<?php 

template_include("/backend/partials/sidebar");

?>
<!-- ============================================================================= -->
<!-- ============================================================================= -->
<!-- ============================================================================= -->
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Welcome ! Admin.</h1>
    <ol class="breadcrumb mb-4 d-flex justify-content-between align-items-center">
      <li class="breadcrumb-item active">Edit Product</li>
      <li>
        <a href="/admin/manager/products" class="btn btn-primary">Manage Products</a>
      </li>
    </ol>
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-8"> 
        <?php if(session_get("message")) : ?> 
          <div class="card text-bg-primary mb-3">
            <div class="card-body">
              <p class="card-text"> <?= session_get("message") ?> </p>
            </div>
          </div> 
        <?php endif ; ?> 
        <h1 class="mb-4">Edit Product</h1>
        <form action="/admin/product/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="update">
          <input type="hidden" name="id" value="<?= $product['id'] ?>">
          <!-- Product Name -->
          <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" id="productName" class="form-control" placeholder="Enter product name" name="productName" value="<?php 
              if(old('productName')) {
                  echo trim(old('productName'));
              }else{
                  echo trim($product['product_title']);
              }
            ?>"> 
            <?php if(error("productName")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productName') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>

          <div class="mb-3">
                <label for="productModel" class="form-label">Product Mdel</label>
               
                <input type="text" id="productModel" class="form-control" placeholder="Enter product model" name="productModel" value="<?= old('productModel') ?? $product['product_model'] ?>">
               
              </div>
          <!-- Product Category -->
          <div class="mb-3">
            <label for="productCategory" class="form-label">Category</label>
            <select id="productCategory" name="productCategory" class="form-select" onchange="updateSubCategories(event)">
              <option value="">Select a category</option> 
              <?php foreach($categories as $category) : ?> 
                <option value="<?= $category['id'] ?>" 
                  <?php if($category['id'] == old("productCategory") || $category['id'] == $product['product_category']) { echo "selected" ; } ?>> 
                  <?= $category['category_name'] ?> 
                </option> 
              <?php endforeach; ?>
            </select> 
            <?php if(error("productCategory")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productCategory') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>
          <!-- Product Sub-Category -->
          <div class="mb-3">
            <label for="productSubCategory" class="form-label">Sub-Category</label>
            <select id="productSubCategory" class="form-select" name="productSubCategory">
              <option value="">Select a sub-category</option> 
              <?php foreach($subcategories as $subcategory) : ?> 
                <option value="<?= $subcategory['id'] ?>" 
                  <?php if($product['product_subcategory'] == $subcategory['id'] ) echo "selected"; ?>> 
                  <?= $subcategory['subcategory_name'] ?> 
                </option> 
              <?php endforeach ; ?>
            </select>
          </div>
          <!-- Product Price -->
          <div class="mb-3">
            <label for="productPrice" class="form-label">Price ($)</label>
            <input type="number" id="productPrice" class="form-control" placeholder="Enter price" min="1" name="productPrice" value="<?php
              if( old("productPrice")){
                echo  old("productPrice");
              }else{
                echo $product['price'];
              }
            ?>"> 
            <?php if(error("productPrice")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productPrice') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>
          <!-- Product Description -->
          <div class="mb-3">
            <label for="productShortDescription" class="form-label">Short Description</label>
            <textarea id="productShortDescription" class="form-control" rows="4" placeholder="Enter product description" name="productShortDescription"><?php 
              if(old('productShortDescription')){
                  echo trim(old('productShortDescription'));
              }else{
                  echo trim($product['short_description']);
              }
            ?></textarea> 
            <?php if(error("productShortDescription")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productShortDescription') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>
          <div class="mb-3">
            <label for="productLongDescription" class="form-label">Long Description</label>
            <textarea id="productLongDescription" class="form-control" rows="4" placeholder="Product Description" name="productLongDescription">
              <?= old("productLongDescription") ?? $product['long_description']?>
            </textarea>
            <?php if(error("productLongDescription")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productLongDescription') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>
          <script>
            tinymce.init({
              selector: 'textarea#productLongDescription',
              plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code', toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
          </script>
          <!-- Product Image -->
          <div class="mb-3">
            <label for="productThumbnail" class="form-label">Upload Thumbnail</label>
            <input type="file" id="productThumbnail" class="form-control" accept="image/*" name="productThumbnail" onchange="previewImage(event)" > 
            <?php if(error("productThumbnail")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productThumbnail') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>
          <!-- Product Image -->
          <div class="mb-3">
            <div class="card" style="width: 18rem;">
              <img id="thumbnailPreview" src="<?= assets('/uploads/'.$product['product_thumbnail']) ?? assets('/uploads/no_image.jpg') ?>" class="card-img-top" alt="...">
            </div>
          </div>

          <script>
            function previewImage(event) {
              const file = event.target.files[0]; // Get the selected file
              const reader = new FileReader(); // Create a FileReader instance

              reader.onload = function(e) {
                // Update the img element's src with the file's data URL
                document.getElementById('thumbnailPreview').src = e.target.result;
              };

              if (file) {
                reader.readAsDataURL(file); // Read the file as a data URL
              }
            }
          </script>
          <!-- Product Alt Text -->
          <div class="mb-3">
            <label for="productThumbnailAltText" class="form-label">Alt Text</label>
            <input type="text" id="productThumbnailAltText" class="form-control" name="productThumbnailAltText" value="<?php 
              if(old('productThumbnailAltText')){
                echo trim(old('productThumbnailAltText'));
              }else{
                echo trim($product['product_thumbnail_alt_text']);
              }
            ?>">
          </div>
          <!-- Product Sliders -->
          <div class="mb-3">
            <label for="productGallaries" class="form-label">Product Gallary</label>
            <input type="file" id="productGallaries" class="form-control" accept="image/*"  name="productGallaries[]" multiple> 
            <?php if(error("productGallaries")): ?>
              <p class="text-danger" style="margin-bottom:-20px">
                <sub> <?= error('productGallaries') ?> </sub>
              </p>
              <div class="p-1"></div> 
            <?php endif; ?>
          </div>

          <div class="mb-3">
            <div class="container text-center">
              <div class="row" id="target_gallarey">
                <?php
                $gallaries = unserialize($product['product_galleries']);
                if(! $gallaries) $gallaries = [];
                foreach($gallaries as $key => $val) : ?>
                  <div class="col-4 mb-3 gallary_view" >
                    <div class="card">
                      <img src="<?= assets('/uploads/'.$val)?>" class="card-img-top" alt="..." style="height: 280px;">
                      <div class="d-flex justify-content-between pb-3">
                        <div class="mt-3">
                          <!-- <form action="">
                            <div class="p-1 d-flex justify-content-between">
                              <input type="file" name="" class="form-control">
                              <button class="btn btn-primary">Change</button>
                            </div>
                          </form> -->
                        </div>
                        <div class="mt-3">
                          <a href="/admin/product/image/gallaries/delete?target=<?php echo $product['id']?>&index=<?= $key ?>" class="btn btn-danger" onClick="CallGallaryDelete(event, this)"  style="margin-right: 4px; margin-top:4px" data-index="<?= $key ?>" data-id="<?= $product['id'] ?>">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  endforeach; ?>
              </div>
            </div>
          </div>

          <!-- Product PDF -->
          <div class="mb-3">
            <label for="productPDF" class="form-label">Upload PDF</label>
            <input type="file" id="productPDF" class="form-control" name="productPDF" accept="application/pdf">
          </div>
          
          <div class="mb-3">
            <div id="pdf-container"></div>
          </div>

          <h1 class="mb-4 mt-2">Open Graph Information to share social media</h1>
          <hr class="border border-primary border-3 opacity-75">
          
          <div class="mb-3">
            <label for="OgTitle" class="form-label">OG Title</label>
            <input type="text" name="OgTitle" class="form-control" id="OgTitle" value="<?= old("OgTitle") ?? $product['og_title'] ?>">
          </div>
          <div class="mb-3">
            <label for="OgDesription" class="form-label">OG Description</label>
            <textarea id="OgDesription" class="form-control" rows="4" placeholder="Enter product description" name="OgDesription"><?php 
              if(old('OgDesription')){
                echo trim(old('OgDesription'));
              }else{
                echo trim($product['og_description']);
              }
            ?></textarea>
          </div>
          <div class="mb-3">
            <label for="OgImage" class="form-label">OG Image</label>
            <input type="file" name="OgImage" class="form-control" id="OgImage" onChange="previewOgImage(event, this)">
          </div>
          <!-- Product Image -->
          <div class="mb-3">
            <div class="card" style="width: 18rem;">
              <img id="ogShow" src="<?= assets('/uploads/'.$product['og_image']) ?? assets('/uploads/no_image.jpg') ?>" class="card-img-top" alt="...">
            </div>
          </div>
          
          <script>
            function previewOgImage(event) {
              const file = event.target.files[0]; // Get the selected file
              const reader = new FileReader(); // Create a FileReader instance

              reader.onload = function(e) {
                // Update the img element's src with the file's data URL
                document.getElementById('ogShow').src = e.target.result;
              };

              if (file) {
                reader.readAsDataURL(file); // Read the file as a data URL
              }
            }
          </script>
          
           <h1 class="mb-4 mt-2">SEO Here</h1>
              <hr class="border border-primary border-3 opacity-75">
              
               <div class="mb-3">
                <label for="productTags" class="form-label">Meta Keywords</label>
                <input type="text" id="productTags" value="<?= $product["meta_tags"] ?? 'Tags....'?>" data-role="tagsinput"  class="form-control" name="productTags"/>
              </div>
              
              <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
               <input type="text" name="meta_title" class="form-control" id="meta_title" value="<?php 
                        if(!empty($product['meta_title'])){
                            echo $product['meta_title'];
                        }else{
                            echo  trim(old('meta_title'));
                        }
                    
                    ?>">
              </div>

              <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea id="meta_description" class="form-control" rows="4" placeholder="Enter product description" name="meta_description"><?php 
                        if(!empty($product['meta_description'])){
                            echo $product['meta_description'];
                        }else{
                            echo  trim(old('meta_description'));
                        }
                    
                    ?>
                </textarea>
              </div>
          
          <!-- Submit Button -->
          <div class="mb-3 p-3">
            <input type="submit" class="btn btn-success w-100" value="Update Product" />
          </div>
          <div class="mb-3 p-3"></div>
        </form>
      </div>
    </div>
  </div>
</main>
<script>
  function updateSubCategories(event) {
    categoryId = parseInt(event.target.value);

    var url = "<?php echo getEnv('SITE_URL'); ?>";
    url = url.replace(/\/$/, ""); 

    // Construct the full URL with categoryId
    fetch(url + "/subcategories/target?id=" + categoryId)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log(data);
      subCategories = data;
      const subCategory = document.getElementById('productSubCategory');
      subCategory.innerHTML = '<option value="">Select a sub-category</option>'; // Reset sub-categories
      if (subCategories) {
        subCategories.forEach(sub => {
          const option = document.createElement('option');
          option.value = sub.id;
          option.textContent = sub.subcategory_name;
          subCategory.appendChild(option);
        });
      }
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
  }

  document.addEventListener('DOMContentLoaded', function() {
    ContentTrim();
    document.getElementById("productGallaries").addEventListener('change', MultipleImage);
  });

  function ContentTrim() {
    document.getElementById("productShortDescription").innerHTML = (document.getElementById("productShortDescription").innerHTML).trim() ;
    document.getElementById("OgDesription").innerHTML = (document.getElementById("OgDesription").innerHTML).trim() ;
  }

  function CallGallaryDelete(event, element) {
    event.preventDefault(); // Prevent page reload

    let target = element.getAttribute("data-id");
    let index = element.getAttribute("data-index");
    let url = `/admin/product/image/gallaries/delete?target=${target}&index=${index}`;

    if (confirm("Are you sure you want to delete this image?")) {
      fetch(url, { method: "GET" })
        .then(response => response.json())
        .then(data => {
          if (data.status) {
            event.target.closest('.gallary_view').style.display = "none" ; 
          } else {
            // Handle error
          }
        })
        .catch(error => console.error("Error deleting image:", error));
    }
  }

  function MultipleImage(event) {
    const images = event.target.files; // Get selected files
    Object.entries(images).forEach(function ([index, file]) { 
      const reader = new FileReader();
      reader.onload = function (e) {
        data = `
        <div class="col-4 mb-3 gallary_view" >
          <div class="card">
            <img src="${e.target.result}" class="card-img-top" alt="..." style="height: 280px;">
          </div>
        </div>
        `;
        document.getElementById("target_gallarey").insertAdjacentHTML('beforeend',data);
      };
      reader.readAsDataURL(file); 
    });
  }
</script>
<!-- ============================================================================ -->
<!-- ============================================================================ -->
<!-- ============================================================================ --> 
<?php

template_include("/backend/partials/footer");

?>