
let url = 'https://'+window.location.hostname+'/';

console.log(url);
 Vue.component('sol-nav',{
  data: () => ({
    url:'https://'+window.location.hostname+'/',
    drawer: null,
    items: [  
            {
              icon: 'account_circle',
              title: "Anasayfa",
              url:url+"Panel"
            },
            {
              icon: 'account_circle',
              title: 'Öğrenci Bilgileri',
              url:url+"Ogrenci/Profil"
          
            },
            {
              icon: 'assignment',
              title: 'Devam Ettiğim Derslerim',
              url:url+"Ogrenci/Guncel_Dersler"
            },
            {
              icon: 'assignment',
              title: 'Tamamladığım Derslerim',
              url:url+"Ogrenci/Alinan_Dersler"
            },
            {
              icon: 'assignment',
              title: 'Ders Notları',
              url:url+"Ogrenci/dersNotlari"
            },
          
            {
              icon: 'rate_review',
              title: 'Destek Al',
              url:url+"Ogrenci/Soru_Sor"
            },
            {
              icon: 'exit_to_app',
              title: 'Çıkış',
              url:url+"authLogout"
            },
        
    ],
    siteAyarlar:[],
  }),
  mounted() {

    this.siteAyarlarGetir()
    this.ogrenciBilgiGetir()

  },
  methods: {
    siteAyarlarGetir() {
      let url = "/apiSiteAyarlar/" /* İstek yapılacak url */
          console.log(url)
          axios.get(url) /* Ben burada get kullandım. Sebebi dışarıdaki apilere sadece get ile istek yapılabiliyor, siz axios.post kullanabilirsiniz */
              .then(donen => { /* Eğer bir sorun yoksa '.then' ile gelen verileri yakalıyoruz */
                  this.siteAyarlar = donen.data; /* Dönen 'data' objesini olduğu gibi user objesinin içine aktardık. Böylelikle v-modeller otomatik  */
              })
              .catch(hata => { /* Eğer bir sorun varsa '.catch' ile oluşan hatayı yakalıyoruz */
                  console.error(hata);
              });

          
    },
  },
  template:`
      <div>
          <v-toolbar dark fixed app  :color="siteAyarlar.SiteTemelRenk">
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
          <v-toolbar-title>{{siteAyarlar.SiteAdi}}</v-toolbar-title>
      </v-toolbar>
    
      <v-navigation-drawer
        v-model="drawer"
        fixed
        app
        @drawer-ac='drawer=!drawer'
      >
        <v-card
        
        href="`+url+`Panel"
        >
       
            <v-img
            :src="url+siteAyarlar.SiteIcLogo"
            height="10%"
          ></v-img>
          </v-card>
        <v-list dense 
        >
            
            <v-divider></v-divider>
              
            <v-list-tile
              v-for="item in items"
              :key="item.title"
                      
              @click=""
              :href="item.url"
            >
              <v-list-tile-action >
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-tile-action>

              <v-list-tile-content >
                <v-list-tile-title >{{ item.title }}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list>
      </v-navigation-drawer>
      </div>
      
      `
  })