<template>
    <div className="container">
        <hr>
        <div className="row">
            <div className="col-sm-12">
                <textarea name="" id="" cols="30" rows="10" className="form-control" readOnly>
                    {{messages.join('\n')}}
                </textarea>
                <hr>
                <input type="text" className="form-control" v-model="textMessage" @keyup.enter="sendMessage">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "chat-test",
    data() {
        return {
            messages: [],
            textMessage: '',
            chatId: ''
        }
    },
    mounted() {
        window.Echo.channel('chat_17')
            .listen('.chat_17', message => {
                console.log('message: ', message.data);
                this.messages.push(message.data.message.message);
            });
        this.getChat();
    },
    methods: {
        sendMessage() {
            axios.post('/api/chat/messages', {
                message: this.textMessage,
                chat_id: this.chatId
            });
            this.messages.push(this.textMessage);
            this.textMessage = '';
        },
        getChat(){
            axios.get('/api/chat/2')
                .then(response => {
                    this.chatId = response.data.data.id;
                })
                .catch(function(e) {
                    console.log(e);
                });
        }
    },
}
</script>
