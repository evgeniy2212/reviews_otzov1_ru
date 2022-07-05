<template>
    <div class="chats">
        <div class="chat__contact"
             v-for="chat in chats"
             @click="setCurrentChat(chat.id); setActiveContact(chat.contact);"
             :key="chat.id">
            <span class="chat__name">
                {{ chat.name }}
            </span>
            <span class="chat__status" :class="chat.status === 1 ? 'is-online': ''">
                {{ chat.status === 1 ? 'online' : 'offline' }}
            </span>
            <span class="chat__count" v-if="chat.messageCount > 0">
                {{ chat.messageCount > 0 ? chat.messageCount : ''}}
            </span>
        </div>
        <div class="chat__contact" v-if="Object.keys(chats).length === 0">
            <span>Чатов нет</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChatList",
    data(){
        return {
            chats: [],
        }
    },
    inject: [
        'setActiveContact',
    ],
    props: [
        'contacts',
        'deleteContactId',
        'newChatId'
    ],
    watch: {
        contacts: {
            handler: function (val, oldVal) {
                if (this.chats.length) {
                    var that = this;
                    this.chats.forEach(function(item){
                        const contact = that.contacts.find(contact => contact.id === item.partner_id);
                        if(contact !== undefined){
                            item.status = contact.status;
                            item.contact.full_name = contact.full_name;
                            item.name = contact.full_name;
                        }
                    });
                }
            },
            deep: true
        },
        deleteContactId(newVal){
            this.deleteChat(newVal);
        },
        newChatId(newVal){
            this.getChats();
        }
    },
    methods: {
        getChats(){
            this.$parent.isLoadedMessages = true;
            var that = this;
            return axios.get('/api/chat/user_chats')
                .then(response => {
                    var that = this;
                    response.data.data.forEach(function(item){
                        that.chats.push({
                            id: item.id,
                            contact: item.contact,
                            partner_id: item.partnerUser.id,
                            name: item.partnerName + ' ' + item.partnerLastName,
                            messageCount: item.unreadMessagesCount,
                            status: item.partnerUser.chat_status
                        });
                    })
                    that.$parent.isLoadedMessages = false;
                })
                .catch(function(e) {
                    console.log('error: ', e);
                    that.$parent.isLoadedMessages = false;
                });
        },
        setCurrentChat(chatId) {
            this.$parent.backPath = 'chat__contact'
            this.$emit('setActive', 'chat__wrap')
            this.$emit('setCurrentChat', chatId)
            this.chats.find(obj => obj.id === chatId).messageCount = 0;
        },
        deleteChat(contact_id){
            if(contact_id !== ''){
                const indexOfObject = this.chats.findIndex(object => {
                    return object.partner_id === contact_id;
                });
                if(indexOfObject > 0){
                    this.chats.splice(indexOfObject, 1);
                }
            }
        },
        listenUnreadMessagesChats(){
            var that = this
            window.Echo.channel('client_unread' + this.authId)
                .listen('.client_unread' + this.authId, message => {
                    let chat = that.chats.find(obj => obj.id == message.data);
                    chat.messageCount = chat.messageCount + 1;
                });
        },
    },
    mounted() {
        this.getChats();
        this.listenUnreadMessagesChats();
    }
}
</script>

<style scoped>
.is-online{
    color: #5dcf5d;
}
</style>
