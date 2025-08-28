<?php 
    $route = "/about";
    template_include("/frontend/partials/header" ,compact('page','route'));
    template_include("/frontend/partials/banner",compact('page'));

?>
<div class="p-3"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            
                <div class="nav flex-column nav-pills" aria-orientation="vertical">
                <a class="nav-link " href="#">About us</a>

                    <a class="nav-link" href="/certificate">Certificate</a>
                    <a class="nav-link  " href="/company-profile">Commpany Profile</a>
                    <a class="nav-link" href="/products">Products</a>
                    <a class="nav-link active" href="/global-partners">Global Partners</a>
                    <a class="nav-link" href="/projects">Our Projects</a>
                    <a class="nav-link" href="/news">News</a>
                    <a class="nav-link " href="/contact-us">Contact us</a>

                   
                </div>
        </div>
        <div class="col-md-9">
        <div class="pinfo" style="width: 100%; background: #ffffff; padding: 10px; min-height: 40vh; ">
                   <div>
                       <h4> Global Parnters</h4>
                       <p>Please select a country to locate a partner</p>
                   </div> 
                                 
                  <select name="country_id" id="country_id" class="" style="margin:0; color:black">
                    <?php 
                        $regions = \app\http\models\Region::all()->get();

                        foreach($regions as $region):
                    ?>
                         <optgroup label="<?= $region['region'] ?>">
                            <?php 
                                $partners = app\http\models\Partners::where($region['id'], 'region_id')->get();

                                foreach($partners as $partner):
                            ?>
                            <option value="<?= $partner['id'] ?>"><?= $partner['country_name'] ?></option>
                            <?php endforeach;?>
                        </optgroup>
                    <?php 
                        endforeach;
                    ?>
                   </select>
                   <hr class="hr" />
                    <div id="address_show" style="display: block;margin-top: 10px"> 
                    </div>
                  <script>
                      document.getElementById('country_id').addEventListener('change', function(e){
                          let id = e.target.value;
                         
                          let xhr = new XMLHttpRequest();
                          xhr.open('GET',"/global/partners/details?target="+id, true)
                          xhr.onload = (e) =>{
                              if(xhr.readyState ===4){
                                  if(xhr.status === 200){
                                    let data = JSON.parse(xhr.response);
                                     let show = document.getElementById("address_show")
                                     show.innerHTML = "";
                                     if(data.company_details){
                                          show.innerHTML = data.company_details;
                                     }else{
                                           show.innerHTML = "<p>Nothing found for this country <p>"
                                     }
                                  }
                            
                         }else{
                              console.log(JSON.parse(xhr.response))
                         }
                          }
                          xhr.send(null);
                      })
                  </script>
                </div>
        </div>
    </div>
</div>
<?php 

    template_include("/frontend/partials/footer");

?>