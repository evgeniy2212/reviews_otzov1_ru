<template>
    <div>
        <div class="chat__field-wrap">
            <div class="chat__field">
                <img class="chat__decor left__mod"
                     :src="baseUrl + '/images/message-decor.png'"
                     alt="#">
                <textarea class="chat__textarea"
                          :class="this.validMessage || this.message.length > 0 ? '' : 'invalid__message'"
                          v-model="message"
                          @keydown="isTyping"
                          @blur="validateInput"
                          placeholder="сообщение">
                </textarea>
                <img class="chat__decor right__mod"
                     :src="baseUrl + '/images/message-decor.png'"
                     alt="#">
            </div>
            <input class="btn__emoji"
                   type="image"
                   :src="baseUrl + '/images/emoji_1.png'"
                   @click="toggleEmoji" />
            <div class="chat__emoji-holder"
                 :class="showEmoji === true ? 'is-show' : ''">
                <img class="chat__emoji"
                     v-for="emoji in emojis"
                     @click="sendMessageImage(emoji.src)"
                    :src="emoji.src">
            </div>
        </div>
        <div class="chat__buttons six__mod">
            <a data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
               class="chat__close"
               :href="this.shareLinks.twitter"
               target="_blank"
               type="button">Twitter</a>
            <a data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
               class="chat__close"
               style="text-decoration: none"
               :href="this.shareLinks.facebook"
               target="_blank"
               type="button">Facebook</a>
            <a data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
               class="chat__close"
               style="text-decoration: none"
               :href="this.shareLinks.telegram"
               target="_blank"
               type="button">Telegram</a>
            <button class="chat__close"
                    @click="leaveCurrentChat"
                    type="button">Закрыть</button>
            <button class="chat__close"
                    data-tooltip="В первую очередь необходимо выбрать нужный отзыв, нажав кнопку &quot;Открыть&quot;"
                    @click="sendLink"
                    type="button">Отправить ссылку</button>
            <button class="chat__close"
                    :disabled="!validMessage || this.message.length === 0"
                    @click="sendMessageItem(message)"
                    type="button">
                Отправить
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ChatTextarea",
    data() {
        return {
            message: '',
            showEmoji: false,
            validMessage: true,
            shareLinks:
                {
                    facebook: '',
                    twitter: '',
                    telegram: ''
                },
            emojis: [
                {
                    id: 1,
                    src: this.baseUrl + '/images/emoji_1.png'
                },
                {
                    id: 2,
                    src: this.baseUrl + '/images/emoji_2.png'
                },
                {
                    id: 3,
                    src: this.baseUrl + '/images/emoji_3.png'
                },
                {
                    id: 4,
                    src: this.baseUrl + '/images/emoji_4.png'
                },
                {
                    id: 5,
                    src: this.baseUrl + '/images/emoji_5.png'
                },
                {
                    id: 6,
                    src: this.baseUrl + '/images/emoji_6.png'
                },
                {
                    id: 7,
                    src: this.baseUrl + '/images/emoji_7.png'
                },
                {
                    id: 8,
                    src: this.baseUrl + '/images/emoji_8.png'
                },
                {
                    id: 9,
                    src: this.baseUrl + '/images/emoji_9.png'
                },
                {
                    id: 10,
                    src: this.baseUrl + '/images/emoji_10.png'
                },
                {
                    id: 11,
                    src: this.baseUrl + '/images/emoji_11.png'
                },
                {
                    id: 12,
                    src: this.baseUrl + '/images/emoji_12.png'
                },
                {
                    id: 13,
                    src: this.baseUrl + '/images/emoji_13.png'
                },
                {
                    id: 14,
                    src: this.baseUrl + '/images/emoji_14.png'
                },
                {
                    id: 15,
                    src: this.baseUrl + '/images/emoji_15.png'
                },
                {
                    id: 16,
                    src: this.baseUrl + '/images/emoji_16.png'
                },
                {
                    id: 17,
                    src: this.baseUrl + '/images/emoji_17.png'
                },
                {
                    id: 18,
                    src: this.baseUrl + '/images/emoji_18.png'
                },
                {
                    id: 19,
                    src: this.baseUrl + '/images/emoji_19.png'
                },
                {
                    id: 20,
                    src: this.baseUrl + '/images/emoji_20.png'
                },
                {
                    id: 21,
                    src: this.baseUrl + '/images/emoji_21.png'
                },
                {
                    id: 22,
                    src: this.baseUrl + '/images/emoji_22.png'
                },
                {
                    id: 23,
                    src: this.baseUrl + '/images/emoji_23.png'
                },
                {
                    id: 24,
                    src: this.baseUrl + '/images/emoji_24.png'
                }
            ]
        }
    },
    inject: [
        'sendMessage',
        'setActiveScreen',
        'leaveChat',
        'stopListenChat',
        'isTyping'
    ],
    props: [
        'backPath'
    ],
    methods: {
        validateInput() {
            if(this.message === ''){
                this.validMessage = false;
            } else {
                this.validMessage = true;
            }
        },
        toggleEmoji(){
            this.showEmoji = !this.showEmoji;
        },
        sendMessageItem(message){
            this.sendMessage(message, false);
            this.message = '';
        },
        sendLink(){
            let message = '<a href="' + window.location.href + '" target="_blank">Просмотреть</a>';
            this.sendMessage(message, false);
        },
        sendMessageImage(src){
            this.sendMessage(src, true);
            this.message = '';
            this.showEmoji = false;
        },
        leaveCurrentChat(){
            let back = 'chat__settings'
            if(this.backPath !== undefined) {
                this.back = this.backPath;
            }
            this.setActiveScreen(this.back)
            this.leaveChat()
            this.stopListenChat()
        },
        getSharedLinks()
        {
            var that = this;
            return axios.get('/api/chat/shared_links', {
                params: { url: window.location.href }
            })
                .then(response => {
                    that.shareLinks.facebook = response.data.facebook;
                    that.shareLinks.twitter = response.data.twitter;
                    that.shareLinks.telegram = response.data.telegram;
                })
                .catch(function(e) {
                    console.log('error: ', e);
                });
        },
    },
    mounted() {
        this.getSharedLinks();
    }
}
</script>

<style scoped>
.invalid__message{
    border: 1px solid #ff6c6c;
}
a {
    text-decoration: none;
}
a:link, a:visited {
    color: #1b1e21;
}
a:hover {
    color: #1b1e21;
}
</style>
