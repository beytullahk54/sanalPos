Vue.config.devtools = true;

let vm = new Vue({

        el: '#app',
        mixins: [mixin],
        data: () => ({

            siteAyarlar:[],
            ogretmenDuyuru:[],
            controlDisplay: 'inline',
            menu: false,
            modal: false,
            menu2: false,
            e1: 1,
            expansion: 0,
            color: '#3da269',

            lessons: {},


            labels: [
                '12am',
                '3am',
                '6am',
                '9am',
                '12pm',
                '3pm',
                '6pm',
                '9pm'
            ],
            value: [
                200,
                675,
                410,
                390,
                310,
                460,
                250,
                240
            ],
            date: [],
            dialog: false,
            headers: [{
                    text: 'Dessert (100g serving)',
                    align: 'left',
                    sortable: false,
                    value: 'name'
                },
                { text: 'Calories', value: 'calories' },
                { text: 'Fat (g)', value: 'fat' },
                { text: 'Carbs (g)', value: 'carbs' },
                { text: 'Protein (g)', value: 'protein' },
                { text: 'Actions', value: 'name', sortable: false }
            ],
            desserts: [],
            editedIndex: -1,
            editedItem: {
                name: '',
                calories: 0,
                fat: 0,
                carbs: 0,
                protein: 0
            },
            defaultItem: {
                name: '',
                calories: 0,
                fat: 0,
                carbs: 0,
                protein: 0
            },

            
            popup:true,
            grupBilgi:{
                genelPopup:'Veriler Yükleniyor. Lütfen bekleyiniz...',
                disabled:true
            }, 
        }),

        computed: {
            formTitle() {
                return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
            }
        },

        watch: {
            dialog(val) {
                val || this.close()
            },

        },

        created() {
            this.initialize()
        },
        mounted() {

            this.konulariGetir();
            this.siteAyarlarGetir();
            this.ogretmenDuyuruGetir();
            this.grupBilgiGetir() // fonksiyon ile öğrenciye ait bilgileri ilk açılışta çekmek için kullanılır


        },



        props: {
            source: String
        },
        methods: {
            popupClose(){
              vm.popup=false;
            },
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
            grupBilgiGetir(){
                let url = this.url+"/apiOgrenciBolum?kod=f4fc5050b42e6bd3a62f6708379fa812&Bolum_Id="+this.Bolum_Id /* İstek yapılacak url */
               console.log(this.url);
               axios.get(url) /* Ben burada get kullandım. Sebebi dışarıdaki apilere sadece get ile istek yapılabiliyor, siz axios.post kullanabilirsiniz */
                   .then(donen => { /* Eğer bir sorun yoksa '.then' ile gelen verileri yakalıyoruz */
                       console.log(donen); /* Konsoldan gelen verileri görebilirsiniz */
                       //this.lessons = donen.data; /* Dönen 'data' objesini olduğu gibi user objesinin içine aktardık. Böylelikle v-modeller otomatik  */
                      vm.grupBilgi=donen.data;
                     
                      vm.events=[         
                         {
                         title: 'Eğitim Başlama Tarihi',
                         details: 'Eğitim Başlama Tarihiniz :'+donen.data.egitim_bitis_tarih,
                         date: donen.data.egitim_baslama_tarih,
                         open: false
                         },
          
                         {
                         title: 'Eğitim Bitiş Tarihi',
                         details: 'Eğitim Bitiş Tarihiniz : '+donen.data.egitim_bitis_tarih,
                         date: donen.data.egitim_bitis_tarih,
                         open: false
                         },
          
                         {
                         title: 'Sınav Başlangıç Tarihi',
                         details: 'Sınav Başlangıç Tarihiniz : '+donen.data.egitim_bitis_tarih,
                         date: donen.data.egitim_bitis_tarih,
                         open: false
                         }
                       ]
                   })
                   .catch(hata => { /* Eğer bir sorun varsa '.catch' ile oluşan hatayı yakalıyoruz */
                       console.error(hata);
                   });
              },
            ogretmenDuyuruGetir() {
                  let url = "/apiOgretmenDuyurular/" /* İstek yapılacak url */
                      console.log(url)
                      axios.get(url) /* Ben burada get kullandım. Sebebi dışarıdaki apilere sadece get ile istek yapılabiliyor, siz axios.post kullanabilirsiniz */
                          .then(donen => { /* Eğer bir sorun yoksa '.then' ile gelen verileri yakalıyoruz */
                              this.ogretmenDuyuru = donen.data; /* Dönen 'data' objesini olduğu gibi user objesinin içine aktardık. Böylelikle v-modeller otomatik  */
                          })
                          .catch(hata => { /* Eğer bir sorun varsa '.catch' ile oluşan hatayı yakalıyoruz */
                              console.error(hata);
                          });
      
                      
            },
            sorulariGetir() {

            },

            konulariGetir() {
                let url = "/apiOgrenciDersler/" /* İstek yapılacak url */
                console.log(url)
                axios.get(url) /* Ben burada get kullandım. Sebebi dışarıdaki apilere sadece get ile istek yapılabiliyor, siz axios.post kullanabilirsiniz */
                    .then(donen => { /* Eğer bir sorun yoksa '.then' ile gelen verileri yakalıyoruz */
                        console.log(donen); /* Konsoldan gelen verileri görebilirsiniz */
                        this.lessons = donen.data; /* Dönen 'data' objesini olduğu gibi user objesinin içine aktardık. Böylelikle v-modeller otomatik  */


                    })
                    .catch(hata => { /* Eğer bir sorun varsa '.catch' ile oluşan hatayı yakalıyoruz */
                        console.error(hata);
                    });

                console.log('konular getirildi.')
            },
            onInput(val) {
                this.steps = parseInt(val)
            },
            initialize() {
                this.desserts = [{
                        name: 'Frozen Yogurt',
                        calories: 159,
                        fat: 6.0,
                        carbs: 24,
                        protein: 4.0
                    },
                    {
                        name: 'Ice cream sandwich',
                        calories: 237,
                        fat: 9.0,
                        carbs: 37,
                        protein: 4.3
                    },
                    {
                        name: 'Eclair',
                        calories: 262,
                        fat: 16.0,
                        carbs: 23,
                        protein: 6.0
                    },
                    {
                        name: 'Cupcake',
                        calories: 305,
                        fat: 3.7,
                        carbs: 67,
                        protein: 4.3
                    },
                    {
                        name: 'Gingerbread',
                        calories: 356,
                        fat: 16.0,
                        carbs: 49,
                        protein: 3.9
                    },
                    {
                        name: 'Jelly bean',
                        calories: 375,
                        fat: 0.0,
                        carbs: 94,
                        protein: 0.0
                    },
                    {
                        name: 'Lollipop',
                        calories: 392,
                        fat: 0.2,
                        carbs: 98,
                        protein: 0
                    },
                    {
                        name: 'Honeycomb',
                        calories: 408,
                        fat: 3.2,
                        carbs: 87,
                        protein: 6.5
                    },
                    {
                        name: 'Donut',
                        calories: 452,
                        fat: 25.0,
                        carbs: 51,
                        protein: 4.9
                    },
                    {
                        name: 'KitKat',
                        calories: 518,
                        fat: 26.0,
                        carbs: 65,
                        protein: 7
                    }
                ]
            },

            editItem(item) {
                this.editedIndex = this.desserts.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem(item) {
                const index = this.desserts.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
            },

            close() {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save() {
                if (this.editedIndex > -1) {
                    Object.assign(this.desserts[this.editedIndex], this.editedItem)
                } else {
                    this.desserts.push(this.editedItem)
                }
                this.close()
            }


        },
    }

)



/*
TODO
sdfsdf
*/