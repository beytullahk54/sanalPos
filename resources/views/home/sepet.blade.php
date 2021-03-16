


    


<div class='col-md-12 col-xs-12' v-if='asamaSepet'>

    <h3 class="h3">Eğitimler </h3>
    <div class="row">
        <div class="col-md-3 col-sm-6" v-for='egitim in egitimler' :key='egitim.id'>
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="#">
                        <img class="pic-1" v-if='egitim.resim == null' src="{{URL::Asset('panelFile/site/dpu-sanalpos.png')}}">
                        <img class="pic-2" v-if='egitim.resim == null' src="{{URL::Asset('panelFile/site/dpu-sanalpos2.png')}}"> 
                        <img class="pic-1" v-if='egitim.resim != null' :src="'/'+egitim.resim">
                        <img class="pic-2" v-if='egitim.education_image_2 == null' :src="'/'+egitim.resim"> 
                        <img class="pic-2" v-if='egitim.education_image_2 != null' :src="'/'+egitim.education_image_2"> 
                    </a>
                    <!--<span class="product-new-label">New</span>-->
                </div>
                <div class="product-content">
                    <h3 class="title" ><a  href="#">@{{egitim.education_name}}</a></h3>
                    <div class="price">
                        @{{egitim.education_price}} ₺
                        <!--<span>$16.00</span>-->
                    </div>
                    <a class="add-to-cart text-white" v-if='egitimControl(egitim)' @click='sepeteEkle(egitim)'>SEPETE EKLE</a>
                    <a class="delete-to-cart text-white"  v-if='!egitimControl(egitim)' @click='sepettenCikar(egitim)' >SEPETTEN ÇIKAR</a>
                </div>
            </div>
        </div>
    </div>
</div>

