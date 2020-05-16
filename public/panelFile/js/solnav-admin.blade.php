
//Component
	
 

	
	  
	  //VueJS
	  
 let vm = new Vue({
  el: '#app',
  mixins: [mixin],
    data: () => ({
        dialog:false,
        dialog2: false, 
        dialog4: false,
        dialogm1: 1,
        dialog3: false,
        selected: [],
        search: '',
        name: ' ',
        siteAyarlar:[],
        items: [
                {
                  action: 'settings',
                  title: 'Öğrenciler',
                  items: [
                    { title: 'Öğrenciler' },
                    { title: 'Öğrenci Tc Ekle' },
                    { title: 'Öğretmen Duyurusu' },
                    { title: 'Grup Ekle' },
                    { title: 'Öğrenciye Ders Tanımla' },
                    { title: 'Sertifika Bekleyenler' },
                    { title: 'Sertifika Alanlar' },
                  ]
                },
                {
                  action: 'computer',
                  title: 'Ders',
                  items: [
                    { title: 'Dersler' },
                    { title: 'Konular' },
                    { title: 'Paketler' },
                    { title: 'Ders Notu' },
                    { title: 'Ödevler' },
                  ]
                },
                {
                  action: 'settings',
                  title: 'Sınav',
                  items: [
                    { title: 'Sorular' },
                    { title: 'Sınavlar' },
                    { title: 'Sınava Giriş Yapanlar' }
                
                  ]
                },
                {
                  action: 'local_offer',
                  title: 'Dosya Yöneticisi',
                },
                {
                  action: 'settings',
                  title: 'Site Ayarları',
                  items: [
                    { title: 'Rol' },
                    { title: 'Kullanıcı' },
                    { title: 'Sms Şablonu' },
                    { title: 'Ayarlar' },
                  ]
                },
                {
                  action: 'local_offer',
                  title: 'Admin Paneli Nasıl Kullanılır?',
                },
                
              ],
        drawer: null,
        search: '',
        selected: [],
        headers: [
          {
            text: 'Dessert (100g serving)',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Calories', value: 'calories' },
          { text: 'Fat (g)', value: 'fat' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' }
        ],
        desserts: [
          {
            value: false,
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1%'
          },
          {
            value: false,
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
            iron: '1%'
          },
          {
            value: false,
            name: 'Eclair',
            calories: 262,
            fat: 16.0,
            carbs: 23,
            protein: 6.0,
            iron: '7%'
          },
          {
            value: false,
            name: 'Cupcake',
            calories: 305,
            fat: 3.7,
            carbs: 67,
            protein: 4.3,
            iron: '8%'
          },
          {
            value: false,
            name: 'Gingerbread',
            calories: 356,
            fat: 16.0,
            carbs: 49,
            protein: 3.9,
            iron: '16%'
          },
          {
            value: false,
            name: 'Jelly bean',
            calories: 375,
            fat: 0.0,
            carbs: 94,
            protein: 0.0,
            iron: '0%'
          },
          {
            value: false,
            name: 'Lollipop',
            calories: 392,
            fat: 0.2,
            carbs: 98,
            protein: 0,
            iron: '2%'
          },
          {
            value: false,
            name: 'Honeycomb',
            calories: 408,
            fat: 3.2,
            carbs: 87,
            protein: 6.5,
            iron: '45%'
          },
          {
            value: false,
            name: 'Donut',
            calories: 452,
            fat: 25.0,
            carbs: 51,
            protein: 4.9,
            iron: '22%'
          },
          {
            value: false,
            name: 'KitKat',
            calories: 518,
            fat: 26.0,
            carbs: 65,
            protein: 7,
            iron: '6%'
          }
        ]
    }),

	
    mounted(){

      this.siteAyarlarGetir()
    },
	  computed: {
    filteredList() {
      return this.items.filter(title => {
        return items.title.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  },
  methods:{
    
      siteAyarlarGetir() {
      let url = "/apiSiteAyarlar/" /* İstek yapılacak url */
          console.log(url)
           axios.get(url)   /* Ben burada get kullandım. Sebebi dışarıdaki apilere sadece get ile istek yapılabiliyor, siz axios.post kullanabilirsiniz */
           async .then(donen =>  { /* Eğer bir sorun yoksa '.then' ile gelen verileri yakalıyoruz */
                this.siteAyarlar = donen.data /* Dönen 'data' objesini olduğu gibi user objesinin içine aktardık. Böylelikle v-modeller otomatik  */
              })
              .catch(hata => { /* Eğer bir sorun varsa '.catch' ile oluşan hatayı yakalıyoruz */
                  console.error(hata)
              });

          
      },
  }
	
	
  });
