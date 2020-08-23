import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll);

require('./bootstrap');

window.Vue = require('vue');

Vue.component('message', require('./components/Message.vue'));

const app = new Vue({
    el: '#app',
    data: {
        msg:'',
        chat: {
            msg:[]
        }
    },
    methods: {
        send(){
            if(this.msg.length != 0) {
                this.chat.msg.push(this.msg);
                this.msg = '';
            }
        }
    }
});
