<template>
    <div class="chat__wrap"
         :class="screen === 'chat__wrap' ? 'is-active' : ''">
        <div class="chat__contact is-online">
            <span class="chat__name">{{ contact.full_name }}</span>
            <span class="chat__status"
                  :class="contact.status === 1 ? 'is-online': ''">
                {{ contact.status === 1 ? 'online' : 'offline' }}
            </span>
        </div>
        <div class="chat__buttons three__mod">
            <button class="chat__close"
                    @click="controlButtons"
                    type="button">
                {{ showControlButtons === true ? 'Close' : 'Edit' }}
            </button>
            <button v-if="isSelectedAll"
                    class="chat__close"
                    v-show="showControlButtons"
                    @click="unselectAll"
                    type="button">
                Unselect all
            </button>
            <button v-else
                    class="chat__close"
                    v-show="showControlButtons"
                    @click="selectAll"
                    type="button">
                Select all
            </button>
            <button class="chat__close"
                    v-show="showControlButtons"
                    @click="deleteSelected"
                    type="button">
                Delete
            </button>
        </div>
        <div class="chat__window">
            <template>
                <loader v-show="isLoadedMessages === true"
                        object="#2f5496"
                        color1="#ffffff"
                        color2="#17fd3d"
                        size="3"
                        speed="1"
                        bg="#343a40"
                        objectbg="#999793"
                        opacity="80"
                        disableScrolling="false"
                        name="spinning">
                </loader>
            </template>
            <div class="chat__holder" v-chat-scroll="{always: false, smooth: true}">
                <infinite-loading @infinite="infiniteHandler"
                                  :identifier="chatId"
                                  direction="top"
                                  :distance="distance"></infinite-loading>
                <div class="chat__message"
                     :class="message.sender === true ? 'sender' : 'receiver'"
                     v-for="(message, $index) in messages" :key="$index">
                    <div class="checkbox-item">
                        <input type="checkbox"
                               class="custom-checkbox"
                               v-show="showControlButtons"
                               :checked="message.checked"
                               @click="checkMessage(message.id)"
                               :id="message.id">
                        <label :for="message.id"
                               v-show="showControlButtons"></label>
                    </div>
                    <img class="chat__decor left__mod"
                         :src="baseUrl + '/images/message-decor.png'"
                         alt="#">
                    <p v-if="message.isImg == 1 || message.isImg === true">
                        <img class="message__img"
                             v-if="message.isImg == 1 || message.isImg === true"
                             :src="message.body">
                    </p>
                    <p v-else v-html="message.body">
                    </p>
                </div>
            </div>
            <span v-show="typing"
                  class="help-block"
                  style="font-style: italic;">
                {{ this.contact.full_name }} печатает...
            </span>
        </div>
        <chat-textarea :back-path="backPath"></chat-textarea>
    </div>
</template>

<script>
import ChatTextarea from "./ChatTextarea";
import InfiniteLoading from 'vue-infinite-loading';
export default {
    name: 'ChatMessages',
    components: {
        ChatTextarea,
        InfiniteLoading
    },
    props: [
        'chatId',
        'screen',
        'newMessage',
        'contact',
        'backPath'
    ],
    data(){
        return {
            messages: [],
            pageId: 0,
            currentChatId: '',
            isSelectedAll: false,
            isLoadedMessages: true,
            showControlButtons: false,
            deleteMessageIds: [],
            deleteMessagePositions: [],
            typing: false,
            timer: {},
            distance: -10
        }
    },
    provide() {
        return {
            sendMessage: this.sendMessage,
            isTyping: this.isTyping,
        };
    },
    watch: {
        chatId(newVal){
            this.isLoadedMessages = true;
            this.messagesmessages = []
            this.currentChatId = newVal;
            this.pageId = 0;
            this.messages = [];
            this.getMessages();
            let _this = this;
            window.Echo.private('typing-' + this.currentChatId)
                .listenForWhisper('typing', (e) => {
                    if(_this.contact.id == e.user){
                        _this.typing = true;
                        clearTimeout(_this.timer);
                        // remove is typing indicator after 0.9s
                        _this.timer = setTimeout(function() {
                            console.log('setTimeout');
                            _this.typing = false
                        }, 1500);
                    }
                });
        },
        newMessage(newVal){
            if(this.authId != newVal.user.id){
                this.messages.push({
                    id: newVal.message_id,
                    body: newVal.message,
                    sender: newVal.is_sender,
                    isImg: newVal.is_media
                })
            }
        }
    },
    methods: {
        getMessages()
        {
            if(this.chatId !== ''){
                this.pageId = this.pageId + 1;
                var that = this;
                return axios.get('/api/chat/messages/' + this.chatId + '?page=' + this.pageId)
                    .then(response => {
                        if(response.data.data.length > 0){
                            let result = [];
                            response.data.data.forEach(function(item){
                                result.push({
                                    id: item.message_id,
                                    body: item.message,
                                    sender: item.is_sender,
                                    isImg: item.is_media,
                                    checked: false
                                });
                            })
                            this.messages.unshift(...result.reverse());
                            let lastMessage = this.messages.slice(-1);
                            this.$parent.$parent.lastMessageId = lastMessage.length ? lastMessage[0].id : '';
                            that.isLoadedMessages = false;
                            that.distance = 1;
                        } else {
                            that.isLoadedMessages = false;
                        }
                    })
                    .catch(function(e) {
                        console.log('error: ', e);
                    });
            } else {
                console.log('getMessages FIRST: ', this.chatId);
                this.isLoadedMessages = false;
                this.distance = -10;
            }
        },
        infiniteHandler($state) {
                this.pageId = this.pageId + 1;
                var that = this;
                return axios.get('/api/chat/messages/' + this.chatId + '?page=' + this.pageId)
                    .then(response => {
                        if(response.data.data.length > 0){
                            let result = [];
                            response.data.data.forEach(function(item){
                                result.push({
                                    id: item.message_id,
                                    body: item.message,
                                    sender: item.is_sender,
                                    isImg: item.is_media,
                                    checked: false
                                });
                            })
                            this.messages.unshift(...result.reverse());
                            let lastMessage = this.messages.slice(-1);
                            this.$parent.$parent.lastMessageId = lastMessage.length ? lastMessage[0].id : '';
                            that.isLoadedMessages = false;
                            $state.loaded();
                        } else {
                            that.isLoadedMessages = false;
                            $state.complete();
                        }
                    })
                    .catch(function(e) {
                        console.log('error: ', e);
                    });
        },
        sendMessage(message, isImg = false, chatId = null, showModal = false){
            const newMessage = {
                id: new Date().toISOString(),
                body: message,
                sender: true,
                isImg: isImg,
                checked: false
            }
            this.messages.push(newMessage);
            this.storeMessage(newMessage, chatId);
            this.$parent.showModal = showModal;
        },
        storeMessage(message, chatId = null){
            var that = this;
            axios.post('/api/chat/messages',
                {
                    chat_id: chatId ?? this.chatId,
                    is_media: message.isImg,
                    message: message.body
                })
                .then(function(response){
                    if(that.$parent.showModal){
                        that.$parent.linkSentSuccess = true;
                    }
                    console.log('response: ', response)
                })
                .catch(function(e) {
                    console.log('error: ', e);
                });
        },
        deleteMessages(){
            axios.post(this.baseUrl + '/api/chat/messages/delete',
                {
                    messages: this.deleteMessageIds
                })
                .then(function(response){
                    console.log('response: ', response)
                })
                .catch(function(e) {
                    console.log('error: ', e);
                });
        },
        controlButtons(){
            this.showControlButtons = !this.showControlButtons;
        },
        checkMessage(id){
            this.messages.find(obj => obj.id === id).checked = !this.messages.find(obj => obj.id === id).checked;
        },
        selectAll(){
            this.messages.forEach(function(item){
                item.checked = true;
            });
            this.isSelectedAll = true;
        },
        unselectAll(){
            this.messages.forEach(function(item){
                item.checked = false;
            });
            this.isSelectedAll = false;
        },
        deleteSelected() {
            var that = this;
            this.messages.forEach(function(item, index){
                that.isLoadedMessages = true;
                if(item.checked === true){
                    that.deleteMessageIds.push(item.id);
                    that.deleteMessagePositions.push(index);
                }
                that.isLoadedMessages = false;
            });
            that.deleteMessagePositions.forEach(function(item){
                that.messages.splice(item, 1);
            });
            this.messages.forEach(function(item){
                item.checked = false;
            });
            this.deleteMessages();
        },
        isTyping() {
            if(this.currentChatId){
                let channel = window.Echo.private('typing-' + this.currentChatId);
                var that = this;
                setTimeout(function() {
                    channel.whisper('typing', {
                        user: that.authId,
                        typing: true
                    });
                }, 300);
            }
        }
    },
}
</script>
<style scoped>
.is-online{
    color: #5dcf5d;
}
.help-block{
    position: absolute;
    bottom: 1px;
    left: 0;
    right: 0;
    background: #fff;
    line-height: 1.1;
    padding: 0 6px;
}
.chat__window{
    position: relative;
}
.message__img{
    height: 85px;
    width: auto;
}
.sender{
    background-color: #c0daeda6;
}
.receiver{
    background-color: #edd992b3;
}
</style>
