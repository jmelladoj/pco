<template>

  <v-layout row>
    <v-flex class="online-users" xs3>
      <v-list>
          <v-list-item
            v-for="friend in friends"
            :color="(friend.id==activeFriend)?'green':''"
            :key="friend.id"
            @click="activeFriend=friend.id"
          >
            <v-list-item-action>
              <v-icon :color="(onlineFriends.find(user=>user.id===friend.id))?'green':'red'">account_circle</v-icon>
            </v-list-item-action>

            <v-list-item-content>
              <v-list-item-title>{{friend.nombre}}</v-list-item-title>
            </v-list-item-content>

            <!-- <v-list-item-avatar>
              <img :src="item.avatar">
            </v-list-item-avatar> -->
          </v-list-item>


        </v-list>

    </v-flex>
    
    <v-flex id="privateMessageBox" class="messages mb-5" xs9>
        <message-list :user="user" :all-messages="allMessages"></message-list>

        <div class="floating-div">
            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />

        </div>

        <v-footer
                height="auto"
                fixed
                color="grey"
        >
            <v-layout row >
                <v-flex class="ml-2 text-right" xs1>
                    <v-btn @click="toggleEmo" fab dark small color="pink">
                        <v-icon>insert_emoticon </v-icon>
                    </v-btn>
                </v-flex>

                <v-flex xs1 class="text-center">
                    <file-upload
                            :post-action="'/private-messages/'+activeFriend"
                            ref='upload'
                            v-model="files"
                            @input-file="$refs.upload.active = true"
                            :headers="{'X-CSRF-TOKEN': token}"
                    >
                        <v-icon class="mt-3">attach_file</v-icon>
                    </file-upload>

                </v-flex>
                <v-flex xs6 >
                    <v-text-field
                            rows=2
                            v-model="message"
                            label="Enter Message"
                            single-line
                            @keyup.enter="sendMessage"
                    ></v-text-field>
                </v-flex>

                <v-flex xs4>
                    <v-btn
                            @click="sendMessage"
                            dark class="mt-3 ml-2 white--text" small color="green">Enviar</v-btn>


                </v-flex>

            </v-layout>


        </v-footer>


    </v-flex>

  </v-layout>

</template>

<script>
  import MessageList from './_message-list'
  import { Picker } from 'emoji-mart-vue'


  export default {
    props:['user'],
    components:{
      Picker,
      MessageList
    },
    
    data () {
      return {
        message:null,
        files:[],
        activeFriend:null,
        typingFriend:{},
        onlineFriends:[],
        allMessages:[],
        typingClock:null,
        emoStatus:false,
        users:[],
        token:document.head.querySelector('meta[name="csrf-token"]').content

      }
    },

    computed:{
      friends(){
        return this.users.filter((user)=>{
          return user.id !==this.user.id;
        })
      }
    },

    watch:{
      files:{
        deep:true,
        handler(){
          let success=this.files[0].success;
          if(success){
            this.fetchMessages();
          }
        }
      },
      activeFriend(val){
        this.fetchMessages();
      },
      '$refs.upload'(val){
        console.log(val);
      }
    },

    methods:{
      onTyping(){
        Echo.private('privatechat.'+this.activeFriend).whisper('typing',{
          user:this.user

        });
      },
      sendMessage(){

        //check if there message
        if(!this.message){
          return alert('Please enter message');
        }
        if(!this.activeFriend){
          return alert('Please select friend');
        }

          axios.post('/private-messages/'+this.activeFriend, {message: this.message}).then(response => {
                    this.message=null;
                    this.allMessages.push(response.data.message)
                    setTimeout(this.scrollToEnd,100);
          });
      },
      fetchMessages() {
         if(!this.activeFriend){
          return alert('Please select friend');
        }
            axios.get('/private-messages/'+this.activeFriend).then(response => {
                this.allMessages = response.data;
              setTimeout(this.scrollToEnd,100);

            });
        },
      fetchUsers() {
            axios.get('/users').then(response => {
                this.users = response.data;
                if(this.friends.length>0){
                  this.activeFriend=this.friends[0].id;
                }
            });
        },


      scrollToEnd(){
        document.getElementById('privateMessageBox').scrollTo(0,99999);
      },
      toggleEmo(){
        this.emoStatus= !this.emoStatus;
      },
      onInput(e){
        if(!e){
          return false;
        }
        if(!this.message){
          this.message=e.native;
        }else{
          this.message=this.message + e.native;
        }
        this.emoStatus=false;
      },

      onResponse(e){
        console.log('onrespnse file up',e);
      }

    
    },

    mounted(){
    },

    created(){
              this.fetchUsers();

              Echo.join('plchat')
              .here((users) => {
                   console.log('online',users);
                   this.onlineFriends=users;
              })
              .joining((user) => {
                  this.onlineFriends.push(user);
                  console.log('joining',user.nombre);
              })
              .leaving((user) => {
                  this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
                  console.log('leaving',user.nombre);
              });
             
              Echo.private('privatechat.'+this.user.id)
                .listen('PrivateMessageSent',(e)=>{
                  console.log('pmessage sent')
                  this.activeFriend=e.message.user_id;
                  this.allMessages.push(e.message)
                  setTimeout(this.scrollToEnd,100);

              })
              .listenForWhisper('typing', (e) => {

                  if(e.user.id==this.activeFriend){

                      this.typingFriend=e.user;
                      
                    if(this.typingClock) clearTimeout();

                      this.typingClock=setTimeout(()=>{
                                            this.typingFriend={};
                                        },9000);
                  }


                 
            });

    }
    
  }
  
  
</script>

<style scoped>

.online-users,.messages{
  overflow-y:scroll;
  height:100vh;
}




.theme--dark.v-btn:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
    background-color: #e41779;
    margin-left:20px;
    margin-top:10px;
  
}




v-list-tile{
padding:10px;
}

.flex.xs4{
    flex-basis: 9%;

}

.flex.xs6 {
   
    margin-left: 18px;
}

.file-uploads {

    margin-left: 20px;
}




.v-list-item--link:before {
 
    border-bottom: 4px solid #e41779;
    bottom: 0;
    content: "";
    left: 0;
    opacity: 0;
    pointer-events: none;
    position: absolute;
    right: 0;
    top: 0;
    transition: .3s cubic-bezier(.25,.8,.5,1);
}


</style>
