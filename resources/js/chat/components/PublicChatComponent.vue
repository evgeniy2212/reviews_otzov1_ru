<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                       <div class="form-group">
                            <textarea rows="6" readonly="" class="form-control">{{ dataMessage.join('/n') }}</textarea>
                       </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Наберите сообщение" v-model="message">
                            <div class="input-group-append">
                                <button @click="sendMessage" class="btn btn-outline-secondary" type="button">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function(){
          return {
              dataMessage: [],
              message: "",
          }
        },
        methods: {
            sendMessage: function(){
                axios({
                    method: 'get',
                    url: '/send-message',
                    params: {message: this.message}
                }).then((response) => {
                    this.message = "";
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
