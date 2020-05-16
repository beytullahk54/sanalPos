<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $site_ayarlar=\App\site_ayarlar::find(1); 
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$site_ayarlar->SiteAdi}}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.4/vuetify.css">
</head>
<body>
  <div id="app">
	 
    <template>
	
	
      <v-app id="inspire" style="background-image:url('{{$site_ayarlar->login_background}}'); -webkit-background-size: cover; " >
	
       <v-content>
		   	
         <v-container fluid fill-height >
           <v-layout align-center justify-center>
             <v-flex xs12 sm8 md4>
             <form action="{{ route('login') }}" method="POST" >

             {{ csrf_field() }}
               <v-card class="elevation-12" 
                  :elevation="6"
					    style="    border-radius: 15px;" >
                 <v-toolbar dark  color="rgb(40, 112, 186)">
                   <v-toolbar-title>{{$site_ayarlar->SiteAdi}}</v-toolbar-title>
                   <v-spacer></v-spacer>
              
                 </v-toolbar>
                 <v-card-text>
                  
                     <v-text-field prepend-icon="person" name="email" label="Kullanıcı Adı" type="text"></v-text-field>
                     <v-text-field id="password" prepend-icon="lock"  name="password" label="Kullanıcı Şifresi" type="password"></v-text-field>
                  
                 </v-card-text>
                 <v-card-actions>
                   <v-spacer></v-spacer>
                   <v-btn type="submit" color="rgb(40, 112, 186)" dark>Giriş Yap</v-btn>
                 </v-card-actions>
                 <v-card-text>
                 </v-card-text>
               </v-card>
             </form>
             </v-flex>
           </v-layout>
         </v-container>
       </v-content>
		
     </v-app>
		 
   </template>
			
   </div>
   <script>
    let mixin ={  data:{}}
  </script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.14/vuetify.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
	
    <script src="{{URL::Asset('panelFile/js/vuelibrary.js?v24')}}"></script>
    <script>


      var myMixin = {
          data: () => ({
          }),
          mounted() {
          },
    
          computed:{
          
          },
          methods: {
          }
      }
    </script>   
</body>
</html>

<!-- // TODO dsdf-->