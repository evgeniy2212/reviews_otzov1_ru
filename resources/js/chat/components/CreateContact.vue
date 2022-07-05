<template>
    <div>
        <form @submit="onSubmit"
              class="chat__create is-active">
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
            <div class="chat__inputs">
                <input class="chat__input"
                       type="text"
                       v-model="name"
                       :class="{invalid__input: this.validity.name === 'invalid'}"
                       @blur="validateInput('name')"
                       placeholder="Имя">
                <input class="chat__input"
                       type="text"
                       :class="{invalid__input: this.validity.last_name === 'invalid'}"
                       @blur="validateInput('last_name')"
                       v-model="last_name"
                       placeholder="Фамилия">
                <input class="chat__input"
                       type="email"
                       v-model="email"
                       :class="{invalid__input: this.validity.email === 'invalid'}"
                       @blur="validateInput('email')"
                       placeholder="Почта">
            </div>
            <div class="chat__buttons">
                <button class="chat__close"
                        type="submit">
                    Пригласить
                </button>
                <button class="chat__close"
                        @click="setActiveScreen('')"
                        type="button">
                    Закрыть
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateContact",
    inject: [
        'setActiveScreen',
    ],
    data(){
        return {
            name: '',
            last_name: '',
            email: '',
            validity: {
                name: 'panding',
                last_name: 'panding',
                email: 'panding'
            },
            isLoadedMessages: false
        }
    },
    methods: {
        validateInput(key) {
            console.log('validate: ', key, this[key]);
            if(this[key] === ''){
                this.validity[key] = 'invalid';
            } else {
                this.validity[key] = 'valid';
            }
        },
        onSubmit(e){
            e.preventDefault()
            var that = this;
            const areTrue = Object.values(this.validity).every(
                value => value === 'valid'
            );
            console.log('areTrue: ', areTrue);
            if(!areTrue){
                alert('Проверьте форму')
                return
            }
            this.isLoadedMessages = true;
            that = this;
            axios.post('/api/chat/contact',
                {
                    name: this.name,
                    last_name: this.last_name,
                    email: this.email
                })
                .then(function(response){
                    that.isLoadedMessages = false;
                    if(response.data.success === false){
                        $('#errorMessageContent').text(response.data.message);
                        $('#defaultErrorMessageContent').attr("hidden",true);
                        $('#errorMessageContent').removeAttr('hidden');
                        $('#errorMessage').modal();
                    } else {
                        $('.successMessageContent').remove();
                        $('#successMessageContent').text(response.data.message);
                        $('#successMessageContent').removeAttr('hidden');
                        $('#successMessage').modal();
                    }
                    console.log('response: ', response.data.message)
                })
                .catch(function(e) {
                    console.log('response: ', e.response.data.errors);
                    let errorMessage = '';
                    const errors = e.response.data.errors;
                    for (const [key, value] of Object.entries(errors)) {
                        errorMessage += `${value}` + '\n';
                    }
                    that.isLoadedMessages = false;
                    $('#errorMessageContent').text(errorMessage);
                    $('#defaultErrorMessageContent').attr("hidden",true);
                    $('#errorMessageContent').removeAttr('hidden');
                    $('#errorMessage').modal();
                    console.log(errorMessage);
                });

            this.name = '',
            this.last_name = '',
            this.email = ''
        }
    }
}
</script>

<style scoped>
.invalid__input{
    border: 1px solid #ff6c6c;
}
</style>
