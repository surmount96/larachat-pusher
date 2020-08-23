<template>
    <div class="flex flex-wrap">
        <div class="lg:w-2/6 md:w-2/6 w-full mb-4 mx-auto px-2">
            <div class="bg-white p-4 shadow-lg">
                <h3 class="font-bold border-b border-gray pb-3">
                    Message
                </h3>
                <div class=" my-4 text-medium cursor-pointer ">
                    <div class="flex items-center" v-for="user in users" :key="user.id">
                        <img src="/img/om.png" alt="" class="w-10 h-10 rounded-full border border-gray mx-4">
                        <p class="ml-2 text-blue flex items-center" @click="saveId(user.id)">
                        <span>
                            <span v-if="user.isOnline">
                                <span class="h-2 block mr-2 w-2 rounded-full bg-green-light"></span>
                            </span>
                            <span v-else>
                                <span class="h-2 block w-2 mr-2 rounded-full bg-gray-300"></span>
                            </span>
                        </span>
                            {{ user.name }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="lg:w-4/6 md:w-4/6 w-full mb-4 mx-auto ">
            <div class="bg-blue-deep h-16 rounded-lg flex items-center justify-between">
                <div class="flex items-center">
                    <div class="">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-narrow-left w-16 text-white h-6"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="text-white ml-3" v-if="username">
                        <p class="" style="line-height: 16px">{{ username.name }}</p>
                        <small style="font-size: 10px" v-if="typing">
                            <span>typing</span>
                        </small>
                        <small style="font-size: 10px" v-else>
                            <span v-if="username.isOnline">Online</span>
                            <span v-else>Offline</span>
                        </small>

                    </div>
                </div>
                <div class="mr-4">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="lock-closed w-12 text-white h-6"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                </div>
            </div>
            <div class="overflow-y-scroll p bg-gray py-4" v-chat-scroll="{alawys: false,smooth:true}" :class="{'h-64 ': receiver_id}" v-if="auth_user && receiver_id">
                <div class="flex items-center py-2" v-for="message in messages" :key="message.id" v-if="auth_user.id">
                    <div class="mt-3" v-if=" message.sender_id != auth_user.id">
                        <img src="/img/boy.png" alt="" class="w-10 h-10 rounded-full border border-gray mx-4">
                    </div>
                    <div class=" bg-blue-deep text-white p-4 mb-2 rounded-lg w-128" :class="{' bg-orange text-white ml-auto mr-3': message.sender_id == auth_user.id}">
                        <p >{{ message.body }}</p>
                        <small class="text-right block">{{ message.created_at | changeTimeFormat}}</small>
                    </div>
                </div>
            </div>

            <div class=" flex bg-blue-deep rounded-lg py-2 px-10 text-medium" :class="{'mt-10': !receiver_id }">
                <input type="text" v-model="message" placeholder="Type a message ..." class="rounded-full px-5 focus:outline-none border border-gray py-3 w-full" @keydown="isTyping" @keyup.enter="sendMessage">
                <button class="bg-orange text-white w-48 text-center py-3 rounded-full focus:outline-none" style="margin-left: -3rem" @click="sendMessage">send</button>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    export default {
        name: "Chat",
        props:{
            users: { type: Array}
        },
        data(){
            return {
                'message': null,
                messages: [],
                receiver_id:'',
                auth_user:'',
                username:'',
                typing: false
            };
        },
        created(){
            //Listen for the message event broadcast
            let channel = Echo.private('chat');

                channel.listen('MessageSent', (e) => {
                    this.messages.push(e.message);
                });

            let _this = this;

            //Listen for typing whisper event
                channel.listenForWhisper('typing', (e) => {
                    this.typing = e.typing;
                    // remove is typing indicator after 900ms
                    setTimeout(function() {
                        _this.typing = false
                    }, 900);
                });
            axios.get('/api/user')
                .then(res => { this.auth_user = res.data;} );
        },
        filters:{
            changeTimeFormat(value){
                //use moment to change the time format
                return moment(value).format('h:mm a');
            }
        },
        methods:{
            isTyping(){
                //emitting the typing event
                let channel = Echo.private('chat');
                setTimeout(function() {
                    channel.whisper('typing', {
                        typing: true
                    });
                }, 900)
            },
            getMessage(){
                //request the sender and receiver messages
                axios.get('/api/chat',{
                    params:{
                        receiver_id: this.receiver_id,
                        sender_id: this.auth_user.id
                    }
                })
                    .then(res => { this.messages = res.data;});
            },
            sendMessage(){
                //validate that the input is not empty before sending
                if (this.message.length != ''){
                    let params = {
                        body: this.message,
                        receiver_id: this.receiver_id
                    };
                    axios.post('/api/store/chat',params)
                        .then(() => {
                            this.message = '';
                            this.getMessage();
                        });

                }
            },
            saveId(id){
                //Use the user id from the contact to get the user's name
                this.receiver_id = id;
                axios.get('/api/username',{
                    params:{
                        receiver_id: this.receiver_id,
                    }
                })
                    .then(res => { this.username = res.data; });
                this.getMessage();
            }
        }
    }
</script>

<style lang="scss">
.p{
     &::-webkit-scrollbar{
       width:6px;
     }

     &::-webkit-scrollbar-track{
       -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
       width:6px;
       border-radius: 10px;
     }

     &::-webkit-scrollbar-thumb {
       border-radius: 10px;
       width:6px;
       -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.5);
     }
}
</style>
